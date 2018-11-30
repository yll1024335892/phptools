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
> 2,设置上传信息
> 3,上传文件
> 4,演示
```php
<?php
class indexController extends grace{
    public function index(){
        //提交比对
        if(!empty($_FILES['file'])){
            $uper = new phpGrace\tools\uper('file', 'upload', '2.png');
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


### DirClass.php
```shell
注意不同用户建立一个新的文件夹，管理员能够查看图片并删除(谨慎操作)
```


## License

MIT
