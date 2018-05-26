# Refactoring-PHP
重構 PHP 之路

推薦書籍：

* [Modernizing Legacy Code With PHP]()

前陣子在讀這本重構 PHP 的書，
跟重構聖經不一樣的是，這本書專門重構 PHP 語言，而且循序漸進帶著讀者一起進行重構。
照著書裡面的章節重構後，基本上會把原生 PHP 重構成一個簡單的 MVC 架構。

重構後的 MVC 架構包含了 PSR-1、PSR-2、Autoloader(雖然書內使用 PSR-0，但可用 Composer 取代）、Router、跟依賴注射容器。

另外讀這本書也可以搭配 symfony 的 [Create your own PHP Framework](https://symfony.com/doc/current/create_framework/index.html) 系列文章，這系列文章由 symfony 帶著讀者利用 symfony 的元件，從空白的 PHP Script 打造出一個現代框架。剛好跟這本書有異曲同工之妙，兩邊一起讀更容易深入了解為什麼要重構與好處。


比較重要的章節如下：

1. 介紹什麼是 Legacy Code
2. 把功能提取到 function
3. 把 function 整理進功能相關的 class
4. 用依賴注射取代 global 變數與 new class
5. 撰寫測試
6. 將 SQL 操作抽離至 Repository 類別
7. 將顯示邏輯抽離至 View 檔案
8. 將 Actions 操作抽離至 Controller 檔案
9. 分離 Public 與 Non-Public 的檔案
10. 解耦 URL 與檔案 Path 的關係（加入 Router）
11. 移除 Script 重複的動作 (例如 EC 每個檔案一開始都要引入設定檔跟初始檔案)
12. 加入依賴注射容器（Dependency Injection Container）

書本目錄：

1. Legacy Applications 
2. Consolidate Classes and Functions 
3. Replace global With Dependency Injection
4. Replace new With Dependency Injection
5. Write Tests
6. Extract SQL Statements To Gateways 
7. Extract SQL Statements To Transactions
8. Extract Presentation Logic To View Files
9. Extract Action Logic To Controllers
10. Replace Includes In Classes
11. Separate Public And Non-Public Resources
12. Decouple URL Paths From File Paths
13. Remove Repeated Logic In Page Scripts
14. Add A Dependency Injection Container
