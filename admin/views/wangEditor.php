<?php
require_once 'yanzhenguser.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="applicable-device" content="mobile" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <title>商城商品管理</title>
    <link rel="stylesheet" type="text/css" href="../wangEditor/css/wangEditor.css">
    <link href="../../css/public.css" rel="stylesheet" type="text/css" />
    <link href="../../css/baoliao.css" rel="stylesheet" type="text/css">
    <style type="text/css">
        #editor-trigger {
            height: 300px;
            max-height: 500px;
        }
        .container {
            width: 100%;
            margin: 0 auto;
            position: relative;
        }
    </style>
</head>
<body>

<header>
  <div class="header">
    <h2>商城商品管理</h2>
  </div>
</header>
    <center>
    <input id="title" name="Title" type="text"  placeholder="商品标题"/><br>
    <input id="note" name="Note" type="text"  placeholder="商品简介"/><br>
    <input id="price" name="Price" type="text"  placeholder="商品价格"/><br>
    <input id="oprice" name="Oprice" type="text"  placeholder="商品原价"/><br>
    <input id="source" name="Source" type="text"  placeholder="商品来源"/><br>
    <input id="img" name="Img" type="text"  placeholder="商品图片链接"/><br>
    <h5>商品类型:
    <select id='select'><option value='A'>电脑办公</option><option value='B'>生活用品</option><option value='C'>汽车用品</option><option value='D'>医药保健</option><option value='E'>图书</option><option value='F'>家用电器</option><option value='G'>服装</option><option value='H'>吃货</option></select>
    </center>
    <div id="editor-container" class="container" >
        <div id="editor-trigger" style="height:400px;max-height:500px;">
            <p>在此编辑宝贝详细信息内容...</p>
        </div>
    </div>
    <div class="go_buy"><a href="javascript:void(0);" id="btn1">发布商品</a></div>
    <script type="text/javascript" src="../js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="../wangEditor/js/wangEditor.js"></script>
    <script type="text/javascript" src="../js/plupload/plupload.full.min.js"></script>
    <script type="text/javascript" src="../js/plupload/i18n/zh_CN.js"></script>
    <script type="text/javascript" src="../js/qiniu.js"></script>
    <script type="text/javascript">
        // 封装 console.log 函数
        function printLog(title, info) {
            window.console && console.log(title, info);
        }

        // 初始化七牛上传
        function uploadInit() {
            var editor = this;
            var btnId = editor.customUploadBtnId;
            var containerId = editor.customUploadContainerId;

            // 创建上传对象
            var uploader = Qiniu.uploader({
                runtimes: 'html5,flash,html4',    //上传模式,依次退化
                browse_button: btnId,       //上传选择的点选按钮，**必需**
                uptoken_url: '../qiniu/token/upload_token.php',
                    //Ajax请求upToken的Url，**强烈建议设置**（服务端提供）
                // uptoken : '<Your upload token>',
                    //若未指定uptoken_url,则必须指定 uptoken ,uptoken由其他程序生成
                // unique_names: true,
                    // 默认 false，key为文件名。若开启该选项，SDK会为每个文件自动生成key（文件名）
                // save_key: true,
                    // 默认 false。若在服务端生成uptoken的上传策略中指定了 `sava_key`，则开启，SDK在前端将不对key进行任何处理
                domain: 'http://img.ecfun.cc/',
                    //bucket 域名，下载资源时用到，**必需**
                container: containerId,           //上传区域DOM ID，默认是browser_button的父元素，
                max_file_size: '100mb',           //最大文件体积限制
                flash_swf_url: '../js/plupload/Moxie.swf',  //引入flash,相对路径
                filters: {
                        mime_types: [
                          //只允许上传图片文件 （注意，extensions中，逗号后面不要加空格）
                          { title: "图片文件", extensions: "jpg,gif,png,bmp" }
                        ]
                },
                max_retries: 3,                   //上传失败最大重试次数
                dragdrop: true,                   //开启可拖曳上传
                drop_element: 'editor-container',        //拖曳上传区域元素的ID，拖曳文件或文件夹后可触发上传
                chunk_size: '4mb',                //分块上传时，每片的体积
                auto_start: true,                 //选择文件后自动上传，若关闭需要自己绑定事件触发上传
                init: {
                    'FilesAdded': function(up, files) {
                        plupload.each(files, function(file) {
                            // 文件添加进队列后,处理相关的事情
                            printLog('on FilesAdded');
                        });
                    },
                    'BeforeUpload': function(up, file) {
                        // 每个文件上传前,处理相关的事情
                        printLog('on BeforeUpload');
                    },
                    'UploadProgress': function(up, file) {
                        // 显示进度条
                        editor.showUploadProgress(file.percent);
                    },
                    'FileUploaded': function(up, file, info) {
                        // 每个文件上传成功后,处理相关的事情
                        // 其中 info 是文件上传成功后，服务端返回的json，形式如
                        // {
                        //    "hash": "Fh8xVqod2MQ1mocfI4S4KpRL6D98",
                        //    "key": "gogopher.jpg"
                        //  }
                        printLog(info);
                        // 参考http://developer.qiniu.com/docs/v6/api/overview/up/response/simple-response.html
                        
                        var domain = up.getOption('domain');
                        var res = $.parseJSON(info);
                        var sourceLink = domain + res.key; //获取上传成功后的文件的Url

                        printLog(sourceLink);

                        // 插入图片到editor
                        editor.command(null, 'insertHtml', '<img src="' + sourceLink + '" style="max-width:100%;"/>')
                    },
                    'Error': function(up, err, errTip) {
                        //上传出错时,处理相关的事情
                        printLog('on Error');
                    },
                    'UploadComplete': function() {
                        //队列文件处理完毕后,处理相关的事情
                        printLog('on UploadComplete');

                        // 隐藏进度条
                        editor.hideUploadProgress();
                    }
                    // Key 函数如果有需要自行配置，无特殊需要请注释
                    //,
                    // 'Key': function(up, file) {
                    //     // 若想在前端对每个文件的key进行个性化处理，可以配置该函数
                    //     // 该配置必须要在 unique_names: false , save_key: false 时才生效
                    //     var key = "";
                    //     // do something with key here
                    //     return key
                    // }
                }
            });
            // domain 为七牛空间（bucket)对应的域名，选择某个空间后，可通过"空间设置->基本设置->域名设置"查看获取
            // uploader 为一个plupload对象，继承了所有plupload的方法，参考http://plupload.com/docs
        }

        // 生成编辑器
        var editor = new wangEditor('editor-trigger');
        editor.config.customUpload = true;
        editor.config.customUploadInit = uploadInit;
        editor.create();
        
        $(document).ready(function(){
          function login(){
            $.ajax({
              type:"POST",
              url:"_post.php",
              dataType:"json",
              data:{
                title: $("#title").val(),
                note: $("#note").val(),
                img: $("#img").val(),
                price: $("#price").val(),
                oprice: $("#oprice").val(),
                source: $("#source").val(),
                type: $('#select option:selected') .val(),
                body: editor.$txt.html()
              },
              success:function(data){
                if(data.ok){
                  alert("发布成功");
                  //$("#msg-error").hide(100);
                  //$("#msg-success").show(100);
                  //$("#msg-success-p").html(data.msg);
                  //window.setTimeout("location.href='index.php'", 2000);
                }else{
                  alert("发布失败");
                }
              },
              error:function(jqXHR){
                alert("发布失败");
                //console.log(removeHTMLTag(jqXHR.responseText));
              }
            });
          }
        
        $('#btn1').click(function () {
          // 获取编辑器区域完整html代码
          //var html = editor.$txt.html();
          login();
          //printLog(html);
          // 获取编辑器纯文本内容
          //var text = editor.$txt.text();

          // 获取格式化后的纯文本
          //var formatText = editor.$txt.formatText();
          });
        
        
        })

        
            
            
         
        
    </script>
</body>
</html>