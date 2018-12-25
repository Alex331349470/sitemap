
## 项目概述

* 产品名称：sitemap

## 功能如下

- 用户认证 - 注册、登录、退出
- 个人中心 - 用户个人中心，编辑资料
- 用户授权 - 用户ACL面向资源的权限管理
- 全文搜索 - 站点ES全文搜索
- 分面搜索 - 适合分布式的搜索功能（目前account数据表使用）
- 对比搜索 - 与之相匹配的搜索资源对比，也可作属性分析和数型分析
- 数据可视化 - kibana 数据可视化后台分析
- 数据实时更新 - logstash 数据实时更新
- SQL注入 安全防御
- CSRF 安全防御
- XSS 安全防御

## 运行环境要求

- Nginx 1.8+
- PHP 7.1+
- Mysql 5.7+
- Redis 3.0+
- Memcached 1.4+
- elasticsearch 6.x +
- kibana 6.x +
- logstash 6.x +

## 开发环境部署/安装

本项目代码使用 PHP 框架 [Laravel 5.5](https://d.laravel-china.org/docs/5.5/) 开发，本地开发环境使用 [Laravel Homestead](https://d.laravel-china.org/docs/5.5/homestead)。

下文将在假定读者已经安装好了 Homestead 的情况下进行说明。如果您还未安装 Homestead，可以参照 [Homestead 安装与设置](https://laravel-china.org/docs/5.5/homestead#installation-and-setup) 进行安装配置。

### 基础安装

#### 1. 克隆源代码

克隆 `sitemap` 源代码到本地：
```shell
git clone git@github.com:Alex331349470/dingoapi-trianning.git sitemap    
```
#### 2. 配置本地的 Homestead 环境

1). 运行以下命令编辑 Homestead.yaml 文件：

```shell
homestead edit
```

2). 加入对应修改，如下所示：

```
folders:
    - map: ~/my-path/sitemap/ # 你本地的项目目录地址
      to: /home/vagrant/sitemap

sites:
    - map: sitemap.test
      to: /home/vagrant/sitemap/public

databases:
    - sitemap
```

3). 应用修改

修改完成后保存，然后执行以下命令应用配置信息修改：

```shell
homestead provision
```

随后请运行 `homestead reload` 进行重启。

#### 3. 安装扩展包依赖

    composer install

#### 4. 生成配置文件

```
cp .env.example .env
```

你可以根据情况修改 `.env` 文件里的内容，如数据库连接、缓存、邮件设置等。
#### 5. 创建数据库

在MySQL数据库当中创建sitemap数据库(utf8_general_ci)

#### 6. 生成秘钥

```shell
php artisan key:generate
```

#### 7. 生成数据表及生成测试数据

在 Homestead 的网站根目录下运行以下命令

```shell
$ php artisan migrate --seed
```

初始的用户角色权限已使用数据迁移生成。

#### 8. 生成jwt secret
```
php artisan jwt:secret
```
#### 9. 配置 hosts 文件

    echo "192.168.10.10   sitemap.test" | sudo tee -a /etc/hosts

### 前端框架安装

1). 安装 node.js

直接去官网 [https://nodejs.org/en/](https://nodejs.org/en/) 下载安装最新版本。

2). 安装 Yarn

请按照最新版本的 Yarn —— http://yarnpkg.cn/zh-Hans/docs/install

3). 安装 Laravel Mix

```shell
yarn install
```

4). 编译前端内容

```shell
// 运行所有 Mix 任务...
npm run dev

// 运行所有 Mix 任务并缩小输出..
npm run production
```

5). 监控修改并自动编译

```shell
npm run watch

// 在某些环境中，当文件更改时，Webpack 不会更新。如果系统出现这种情况，请考虑使用 watch-poll 命令：
npm run watch-poll
```
至此, 安装完成 ^_^

## 扩展包使用情况

| 扩展包 | 一句话描述 | 本项目应用场景 |
| --- | --- | --- |
| "dingo/api": "^2.0.0-alpha2" | restful api快速开发组件 | 前端调取 |
| "elasticsearch/elasticsearch": "~6.0" | elasticsearch PHP支持组件 | 搜索引擎 |
| "gregwar/captcha": "^1.1" | 图片验证码 | 防灌水注册 |
| "intervention/image" | 图片裁剪 | 全站图片资源优化 |
| "overtrue/easy-sms" | 短信发送 | 注册、登录、验证 |
| "overtrue/laravel-lang" | laravel 中文支持包 | 项目本地中文化 |
| "predis/predis" | 数据库redis | 数据同步 任务执行 |
| "spatie/laravel-permission" | laravel ACL 权限组件 | 后台ACL |
| "tymon/jwt-auth": "1.0.0-rc.2" | json web token | 认证 |
| "encore/laravel-admin": "1.5.*" | laravel后台系统 UI laravelAdmin-LTE | laravel admin 后台集成系统 |







