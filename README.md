<h1 align="center"> phptools </h1>

<p align="center"> A  php's tools.</p>


## Installing

```shell
$ composer require yll1024335892/phptools -vvv
```

## Usage

TODO

## Contributing

You can contribute in one of three ways:

1. File bug reports using the [issue tracker](https://github.com/yll1024335892/phptools/issues).
2. Answer questions or fix bugs on the [issue tracker](https://github.com/yll1024335892/phptools/issues).
3. Contribute new features or update the wiki.

_The code contribution process is not very formal. You just need to make sure that you follow the PSR-0, PSR-1, and PSR-2 coding guidelines. Any new code contributions must be accompanied by unit tests where applicable._
## ImageClass.php 图片处理的工具
```shell
$image=new ImageClass("xx.png");//打开图片
gif的水印需要优化
```
#### 1.添加水印 - water 方法
```shell
参数
1、水印图片路径
2、水印位置【默认 image::RB - 右下角】，可以使用的参数：
    const LT =   1 ; //左上角
    const TC =   2 ; //上居中
    const RT =   3 ; //右上角
    const LC =   4 ; //左居中
    const CC =   5 ; //居中
    const RC =   6 ; //右居中
    const LB =   7 ; //左下角
    const BC =   8 ; //下居中
    const RB =   9 ; //右下角
    传递时使用数值即可！
3、水印透明度【默认 80】
演示
$image = new ImageClass('demo.jpg');
$image->water('water.png',$img::CC,100);//居中透明度100的水印
$image->save('demo_save');//保存图片【参数文件名，不要传递扩展名】原图是什么扩展就是什么扩展名
```
#### 2.缩略图 - thumb() 方法
```shell
参数
1、缩略图最大宽度
2、缩略图最大高度
3、缩略图裁剪类型
    const TB1 =  1 ; //缩略图等比例缩放
    const TB2 =  2 ; //缩略图缩放后填充
    const TB3 =  3 ; //缩略图居中裁剪
    const TB4 =  4 ; //左上角裁剪类型
    const TB5 =  5 ; //右下角裁剪类型
    const TB6 =  6 ; //固定尺寸缩放类型
    传参时请使用数值！
演示
$image = new ImageClass('demo.jpg');
$image->thumb(200, 200, 3);
$image->save('demo22');
echo '<img src="demo22.jpg" />';
```
#### 3.图片裁切 - crop 方法
```shell
参数
1、裁切区域宽度
2、裁切区域高度
3、裁切区域x坐标【默认 0】
4、裁切区域y坐标【默认 0】
5、图像保存宽度【默认等于裁切宽度】
6、图像保存高度【默认等于裁切高度】
演示
$image = new ImageClass('demo.jpg');
$image->crop(200, 200, 100, 100, 50, 50);
$image->save('demo22');
echo '<img src="demo22.jpg" />';
```
#### 4.添加文字到图片 - text 方法
```shell
参数
1、添加的文字内容
2、字号
3、文字颜色及透明度 rgb 模式【默认 array(0, 0, 0)】
4、 文字写入位置【默认 9】
    const LT =   1 ; //左上角
    const TC =   2 ; //上居中
    const RT =   3 ; //右上角
    const LC =   4 ; //左居中
    const CC =   5 ; //居中
    const RC =   6 ; //右居中
    const LB =   7 ; //左下角
    const BC =   8 ; //下居中
    const RB =   9 ; //右下角
    传递时使用数值即可！
5、文字相对当前位置的偏移量
6、文字倾斜角度
7、字体文件路径【默认 src/temp/fonts/AMBROSIA.ttf】
演示
$image = new ImageClass('demo.gif');
$image->text('yll1024335892', 20, array(255, 0, 0));
$image->save('demo22');
echo '<img src="demo22.gif" />';
```

## UploadClass.php文件上传工具类
####    功能描述
```shell
1、文件扩展名、类型检查
2、文件大小检查
3、目录创建
4、命名规则定制
```
####    使用方式
> 1,实例化上传对象
```
$upload = new UploadClass('fileName', 'upload', '2.png');
UploadClass 类构造函数参数
1、文件域名称(<input type="file" name="fileName" />)
2、上传文件保存文件夹位置
3、可选参数【上传后文件名，默认 null - 根据设置的规则命名】
```
> 2,设置上传信息
```
$upload->allowType = 'image/png,image/jpeg,image/pjpeg,image/x-png,image/gif'; //设置上传允许的类型
$upload->allowExeName  = 'jpg,gif,png'; //允许上传文件的扩展名
$upload->allowSize = 1024允许上传文件的大小 [单位 K]
$upload->dirCreateRule = 'no'; //子文件夹创建规则  no - 不自动创建  |  y - 年 | m - 月(Ym) | d - 日(Ymd)
$upload->renameRule = 3; //文件重命名规则  1: 原文件名 | 2: 随机命名 | 3: _1 后缀形式重命名 | 默认是原文件名
```
> 3,上传文件
```
$uper->upload();
```
> 4,演示
```php
<?php
use Yll1024335892\Phptools\UploadClass;
class indexController{
    public function index(){
        //提交比对
        if(!empty($_FILES['filename'])){
            $uper = new UploadClass('filename', 'upload', '2.png');
            $uploadedFile = $uper->upload();
            if($uploadedFile){
                echo '上传文件路径 : '.$uploadedFile;
            }else{
                echo $uper->error;
            }
        }
    }
}
//html表单
<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="filename" value="" />
    <input type="submit" id="" value="提交" />
</form>
```
## IpClass.php获取真实IP工具
####    功能描述
```
获取客户端真实ip地址。
```
####    使用
```
使用 ip类的静态方法 getIp() 获取客户ip。
```
####    演示
```
<?php
use Yll1024335892\Phptools\IpClass;
class indexController{
    public function index(){
        echo IpClass::getIp();
    }
}
```

## VerifyCodeClass.php图片验证码工具
####    使用代码
```php
<?php
use Yll1024335892\Phptools\VerifyCodeClass;
class indexController{
    public function index(){
        //提交比对
        if(PG_POST){
            //比对验证码
            if($_POST['yzm'] != getSession('pgVcode')){
                echo '验证码错误';
            }else{
                echo '验证码正确';
            }
        }
    }

    //绘制验证码
    public function vcode(){
        /*
         * verifyCode 参数
         * 1、图片宽度
         * 2、图片高度
         * 3、字符总数
         * 4、包含数字的数量
         * 5、字体【可省参数 默认：AMBROSIA.ttf，如需更换请将字体文件部署到 src/temp/fonts 文件夹下】
         */
        $vcode = new VerifyCodeClass(88, 32, 4, 1);
        /*
         * 可修改属性
        $vcode->bgcolor   = array(255, 0, 0); //验证码背景颜色
        $vcode->codeColor = array(0, 255, 0); //验证码文本颜色
        $vcode->fontSize  = 30; //验证码文字大小
        $vcode->noise     = false; //是否绘制干扰字符
        $vcode->noiseNumber = 10; //干扰字符数量
        $vcode->sessionName  = 'yourname'; //保存验证码的 session 名称
        */
        //绘制验证码
        $vcode->draw();
    }
}

利用视图展示验证码，提交 POST 数据
<html>
<head>
<title></title>
</head>
<body>
<form action="" method="post">
    验证码 : <br />
    <input type="text" name="yzm" /><img src="/index/vcode" onclick="changeVcode(this);" /><br />
    <input type="submit" id="" value="提交" />
</form>
<script type="text/javascript">
//点击更换验证码
function changeVcode(vcodeImg){
    vcodeImg.setAttribute('src', '/index/vcode/' + Math.random());
}
</script>
</body>
</html>
```

## TimerClass.php 时间转化工具
####    功能描述
```
日期时间换算，时间戳、时间差、过去时间计算。
```
####    使用说明

>   当前年份 currentYear()
```
$timer = new TimerClass();
echo $timer->currentYear();
```
>   当前月份 currentMonth()
```
$timer = new TimerClass();
echo $timer->currentMonth();
```

>   当前日期 currentDay()
```
$timer = new TimerClass();
echo $timer->currentDay();
```

>   当前时 currentHour()
```
$timer = new TimerClass();
echo $timer->currentHour();
```
>   当前分 currentMin()
```
$timer = new TimerClass();
echo $timer->currentMin();
```

>   当前秒 currentSecond()

```
$timer = new TimerClass();
echo $timer->currentSecond();
```

> 按照指定格式及指定时间戳计算时间 dateTime()
```
参数：

1、$format = "Y-m-d H:i:s" 时间格式，可省参数 【默认 "Y-m-d H:i:s"】
2、$currentTime = null //指定的时间戳，可省参数 【默认当前时间】
演示：

$timer = new TimerClass();
echo $timer->dateTime('m/d/Y H:i:s').'<br />';//当前时间
echo $timer->dateTime('m/d/Y H:i:s', 1524624358).'<br />'; //指定时间戳
```

>   将日期时间转换时间戳 timeStamp()
```
参数：

日期及时间，支持的格式 Y-m-d H:i:s 或 m/d/Y H:i:s
演示：

$timer = new TimerClass();
echo '计算时间戳 : '.$timer->timeStamp('2018-04-24 15:48:04').'<br />';
```

>   计算日期与日期间的差值 DValue($timer1, $timer2)
```
参数：

1、起始日期及时间，支持的格式 Y-m-d H:i:s 或 m/d/Y H:i:s
2、结束日期及时间，支持的格式 Y-m-d H:i:s 或 m/d/Y H:i:s
演示：

$timer = new TimerClass();
echo '计算时间差 : '.$timer->DValue('2018-04-25 15:48:18', '04/25/2018 15:48:12');
```

>   计算过去时间并格式化 fromTime($time)
```
参数：时间戳
演示：

$timer = new TimerClass();
echo $timer->fromTime($timer->timeStamp('2018-04-24 15:48:04'));

```
## Md5Class.php是MD5加密工具
####    功能描述
```
md5 2次加密后随即位置加密工具
```
####    使用说明
```
1、获取MD5操作对象
2、使用对象的 toMd5() 方法进行数据加密（2次md5 + 随即位置加密）
3、使用对象的 getMd5() 方法将加密后的数据还原至2次MD5加密
```
####    演示
```php
<?php
$md5 = new Md5Class();
$str = 'yll1024335892';
echo $md5->toMd5($str).'<br />';
echo $md5->getMd5('94478811d37e11a7ace56c5503174b2dce19');
?>
```

## ServerClass.php获取服务器工具类
####    功能介绍
```
获取服务器相关信息
```
####    演示
```php
<?php
use namespace Yll1024335892\Phptools\ServerClass;
class indexController{
    public function index(){
        $serverInfo = ServerClass::info();
	p($serverInfo);
    }
}
```
####    返回的数据结构
```
Array
(
    [0] => Windows NT ** 10.0 build 14393 (Windows 10) AMD64   //操作系统
    [1] => 5.6.25   //php 版本
    [2] => PRC | 2018-04-20 10:49:20 //时区及时间
    [3] => 2M  //最大上传
    [4] => 120 //最大运行时间
    [5] => apache2handler //web 服务器
    [6] => bundled (2.1.0 compatible)  //gd 库版本
)
```

## CurlClass.php的Curl的通信类工具
####    功能描述
```
curl通讯类，包含 get、post 方式。
```
####    使用get的演示
```php
<?php
use Yll1024335892\Phptools\CurlClass;
class indexController{
    public function index(){
        $curl = new CurlClass();
        $res  = $curl->get('http://api.hcoder.net');
        //返回结果
        echo $res;
    }
}
```
####    使用post的演示
```php
<?php
use Yll1024335892\Phptools\CurlClass;
class indexController{
    public function index(){
        $curl = new CurlClass();
        //post 数据
        $data = array('name' => 'grace', 'age' => 10);
        $res  = $curl->post('http://api.hcoder.net', $data);
        //curl 状态
        p($curl->http_status);
        //传输时间毫秒
        echo $curl->speed;
        //返回结果
        echo $res;
    }
}
```
#### 获取 curl 资源对象
```
curl 资源对象保存在  CurlClass对象的 curlHandle 属性，您可以获取它并继续完成其他功能：
$curlo = $curl->curlHandle;
```

## DownloadClass.php文件下载的工具类
####    功能描述
```
下载指定的文件（可设置下载名）。
```
####    演示
```php
<?php
use Yll1024335892\Phptools\DownloadClass;
class indexController{
    public function index(){
        //不设置下载文件名
        DownloadClass::download('index.php');
        //设置下载文件名
        DownloadClass::download('index.php', '2.php');
    }
}
```

##  XmlClass.php是xml的生成和解析
####    使用
>   生成 XML - create()
```php
参数：

1、xml 数据【数组或字符串格式】
数组格式：
$data = array(
    array('nodeName' => 'person', 'key' => 'value', 'key' => 'value'),
    array('nodeName' => 'person', 'name' => '李四', 'age' => 17),
    array('nodeName' => 'person', 'name' => '王五', 'age' => 18),
    .......................
);
除 nodeName 外的键名称均为自定义名称。

2、根节点名称，可选参数，默认： root

演示 - 数组格式：

//实例化 XML
$xmlObj = new XmlClass();
//演示数据
$data = array(
    array('nodeName' => 'person', 'name' => '张三', 'age' => 16),
    array('nodeName' => 'person', 'name' => '李四', 'age' => 17),
    array('nodeName' => 'person', 'name' => '王五', 'age' => 18)
);
// 创建 XML
$xml = $xmlObj->create($data);
//保存 XML
file_put_contents('demo.xml', $xml);

演示 - 字符格式

$xmlObj = new XmlClass();
/*演示数据
$data = '	<person>
    <name>张三</name>
        <age>18</age>
    </person>
    <person>
        <name>李四</name>
        <age>18</age>
    </person>';
// 创建 XML
$xml = $xmlObj->create($data);
```
>   解析 XML - reader()
```
参数： xml 内容
演示：

$xmlObj = new XmlClass();
$xmlContent = file_get_contents('demo.xml');
$xml = $xmlObj->reader($xmlContent);
print_r($xml);
```


## ReflexClass.php类反射机制
####    功能描述
```
使用 reflex 工具类可以快速的对某个指定的类文件或对象进行反射，类文件结构一目了然！
```
####    使用说明
```
使用 phpGrace\tools\reflex 类的静态方法 r，参数：类或对象。

<?php
use Yll1024335892\Phptools\ReflexClass;
use Yll1024335892\Phptools\MailerClass;
class indexController{
    public function index(){
        $mailer  = new MailerClass();
        ReflexClass::r($mailer);
    }
}
```
#### 反射结果类似
```
文件位置 :
D:\web\localhost\yll1024335892\Phptools\MailerClass.php
属性 :
Property [ default private $mailConfig ]
类内常量 :
方法 :
Method [ user, ctor public method __construct ] { @@ D:\web\localhost\yll1024335892\Phptools\MailerClass.php 24 - 32 }
Method [ user public method send ] { @@ D:\web\localhost\yll1024335892\Phptools\MailerClass.php 34 - 77 - Parameters [4] ......
```

## PinyinClass.php汉字转拼音工具类
####    功能描述
```
将汉字转换为对应的拼音。不能转换的返回原汉字。
```
####    使用
```
echo PinyinClass::getPinyin('您好!').'<br />';
//拼音首字母缩写
echo PinyinClass::getShortPinyin('您好!');
```




## DirClass.php文件夹操作
####    使用说明
```
服务器端文件夹操作，包含创建、删除、重命名等常用功能。
```
####    使用说明

>   扫描目录 scanDir($dir)
```
参数：目录【相对或绝对】
返回：数组形式的目录及文件名
```

>   获取目录列表 listDir($dir)
```
参数：目录【相对或绝对】
返回：数组形式的目录及文件名，格式如下：

Array
(
//fileList 代表文件
[fileList] => Array(
    [0] => .htaccess
    [1] => .project
    [2] => demo.xml
    [3] => favicon.ico
    [4] => index.php
    [5] => test.docx
    [6] => test.pdf)
//dirList 代表文件夹
[dirList] => Array(
    [0] => memadmin
    [1] => myapp
    [2] => phpGrace
    [3] => sessions )
)
```
>   创建文件夹 mkDir($dir)
```
参数：目录【相对或绝对】
```
>   删除文件夹 rmDir($dir, $keepdir = false)
```
参数：1、目录位置 2、是否保留目录【删除内部所有文件夹及文件】
```
>   重命名文件 reName($oldName, $newName)
```
参数：1、原始位置 2、重命名位置
```
>   复制文件夹 copyDir($src, $dst)
```
参数：1、原始位置 2、复制后的位置
```

>   演示代码【请逐一打开注释测试】
```
$dir = new DirClass();
//获取文件夹
//$res = $dir->listDir('D:\web\localhost');
//print_r($res);
//创建文件夹
//$dir->mkDir('./a/b/c/d');
//删除文件夹 [ 递归 ]
//$dir->rmDir('./a');
//重命名
//$dir->reName('./test4/b', './b2');
//复制文件夹
//$dir->copyDir('./b2', './copy/b');
```

###### 注意不同用户建立一个新的文件夹，管理员能够查看图片并删除(谨慎操作)


## NumToCapitalClass.php人民币大写转换类
####    使用说明
```
直接使用 NumToCapitalClass 类的静态方法 : ParseNumber()

echo NumToCapitalClass::ParseNumber(999158899.012);
//输出 玖亿玖仟玖佰壹拾伍万捌仟捌佰玖拾玖元零壹分
```

## QrcodeClass.php二维码生成工具类的封装
####    使用
```
QrcodeClass::draw("http://www.52website.cn","hh.jpg");
```



## License

MIT
