# Refactoring-PHP
重構 PHP 之路

推薦書籍（點擊連結進入簡介）：

* [Modernizing Legacy Code With PHP](https://github.com/WadeHuang1993/Refactoring-PHP/wiki/Modernizing-Legacy-Code-With-PHP)

# 前言

寫這系列文章的起因是，自己在工作崗位中也接手到了所謂的 Legacy Code 的專案，打開程式碼只能看見七零八落難以閱讀的程式碼。這還不打緊，要調整需求時，明明只是修改一段邏輯，卻要改 7 ~ 8 段程式碼，還常要翻遍整個專案來確保有沒有漏改掉的地方！

持續一段時間後，發現這種專案的開發與維護成本太高了，有必要進行重構改善。重構的目標為分離程式碼的責任、提升程式碼的可讀性與重複使用性。本系列文章將依照 [Modernizing Legacy Code With PHP](https://github.com/WadeHuang1993/Refactoring-PHP/wiki/Modernizing-Legacy-Code-With-PHP) 這本書的內容進行重構 PHP。照著書裡面的章節完成重構後，基本上會把原生 PHP 重構成一個簡單的 MVC 架構。

重構後的 MVC 架構包含了 PSR-1、PSR-2、Autoloader（雖然書內使用 PSR-0，但可用 Composer 取代成 PRS-4）、Router、跟依賴注射容器。

讀這本書也可以搭配 symfony 的 [Create your own PHP Framework](https://medium.com/shecodeafrica/building-your-own-custom-php-framework-part-1-1d24223bab18) 系列文章。這系列文章由 symfony 帶著讀者利用 symfony 的元件，從空白的 PHP Script 打造出一個現代框架。剛好跟這本書有異曲同工之妙，兩邊一起讀更容易深入了解為什麼要重構與好處。

## 什麼是 Legacy Code ?

Legacy Code，中文譯為「既有程式碼」，指的是他人遺留下來的程式碼，在你接手之前就已經寫好的程式碼，你完全不知道這些程式碼是如何被完成的。

一般提到 Legacy Code 其實是指那些讓人覺得頭痛難以維護的程式碼，這些程式碼的特徵是缺少組織化、難以維護跟改進、難以閱讀與理解以及無法進行測試。

Legacy Code 可以運作得很好，甚至早已運作多年，但修改起來卻是容易發生錯誤，牽一髮而動全身，任何些微的修改都可能造成未知的錯誤。

本系列文章是針對 PHP 做重構，下面將列出幾個 PHP 典型的 Legacy Code 特徵。如果你的 PHP 應用程式也符合下列一項或多項，那表示你的 PHP 應用程式屬於 Legacy Code，仍有改善的空間：

* 所有的程式檔案都放在專案的根目錄，缺少目錄結構管理。
* 在程式碼的最上方設有 die() 或 exit() 邏輯來避免一些重要的值還沒有被初始化。
* 程式架構不是使用物件導向，而是使用 include 來關聯程式碼之間的邏輯。
* 專案裡面只有少數的 Class 類別。
* 類別的內容是亂無章序、不連貫、不一致的。（不符合單一職權原則)
* 專案的運作依賴未被封裝的程式碼或是 Function 大於 Class。
* 單一個頁面的 Script 就包含了 Model、View、Controller 的邏輯。
* 想整合成其他框架卻沒有整合完整。(只有整合一半)
* 沒有自動化測試的環境給開發者進行測試。

碰過年代久遠的 PHP 應用程式的工程師，應該會對這些特徵感到相當熟悉的，他們將這種程式碼稱之為典型的 PHP 應用程式「typical PHP application」。

## 典型的 PHP 應用程式

多數的 PHP 開發者沒有受過專業嚴謹的訓練，有些開發者們是自學而來，有些可能是來自於其他語言，也有些是單純因為老闆覺得他們是懂程式的工程師，就突然被指派要完成建立網頁應用程式。

這種現象是因為 PHP 弱型別特性讓 PHP 可以免於遵守許多開發原則，讓開發者們可以不用經歷大量訓練就可以完成很多工作，建造網頁甚至網頁應用程式。

以下是常見的典型 Legacy PHP 專案的目錄結構：

/path/to/project/
```
    bin/                 # command-line tools
    cache/               # cache files
    common/              # commonly-used include files
        classes/         # custom classes
            Image.php    #
            Template.php #
    functions/           # custom functions
        db.php           #
        log.php          #
        cache.php        #
        setup.php        # configuration and setup
    css/                 # stylesheets
    img/                 # images
    index.php            # home page script
    js/                  # JavaScript
    lib/                 # third-party libraries
    log/                 # log files
    page1.php            # other page scripts
    page2.php            #
    page3.php            #
    sql/                 # schema migrations
    sub/                 # sub-page scripts
        index.php        #
        subpage1.php     #
        subpage2.php     #
    theme/               # site theme files
        header.php       # a header template
        footer.php       # a footer template
        nav.php          # a navigation template
```



