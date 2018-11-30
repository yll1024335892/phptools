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
### ImageClass.php 图片处理的工具
```shell
$image=new ImageClass("xx.png");
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
$image->water('water.png');
$image->save('demo_save');//保存图片【参数文件名，不要传递扩展名】
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
7、字体文件路径【默认 phpGrace/fonts/AMBROSIA.ttf】
演示
$image = new ImageClass('demo.gif');
$image->text('phpGrace', 20, array(255, 0, 0));
$image->save('demo22');
echo '<img src="demo22.gif" />';
```

### UploadClass.php文件上传工具类
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
$upload->dirCreateRule = 'no'; //子文件夹创建规则  no - 不自动创建  |  y - 年 | m - 月 | d - 日
$upload->renameRule = 3; //文件重命名规则  1: 不重命名 | 2: 随机重命名 | 3: _1 后缀形式重命名
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
        if(!empty($_FILES['file'])){
            $uper = new UploadClass('file', 'upload', '2.png');
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
    <input type="file" name="file" value="" />
    <input type="submit" id="" value="提交" />
</form>
```
### IpClass.php获取真实IP工具
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

### VerifyCodeClass.php图片验证码工具
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
         * 5、字体【可省参数 默认：AMBROSIA.ttf，如需更换请将字体文件部署到 phpGrace/fonts 文件夹下】
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

### TimerClass.php 时间转化工具
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





### DirClass.php
```shell
注意不同用户建立一个新的文件夹，管理员能够查看图片并删除(谨慎操作)
```


## License

MIT
