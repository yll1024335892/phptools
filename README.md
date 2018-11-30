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
```
#### 2.缩略图 - thumb() 方法
#### 3.图片裁切 - crop 方法
#### 4.添加文字到图片 - text 方法

### DirClass.php
```shell
注意不同用户建立一个新的文件夹，管理员能够查看图片并删除(谨慎操作)
```


## License

MIT
