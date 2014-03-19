            <form name="_YNoteInfoForm" class="ydnwc-dialog-form" action="up2.php?method=update&amp;keyfrom=wcp" method="POST" enctype="multipart/form-data" onsubmit="return preSubmit()">
                    <div class="row">
                        <div class="row-hd"><label for="null-name-1">网址:</label></div>
                        <div class="row-bd"><a target="_blank" src="<? echo $pp['src'];?>"><? echo get_word($pp['src'],45);?></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="row-hd"><label for="tl">标题:</label></div>
                        <div class="row-bd">
                            <input type="text" class="ydnwc-dialog-text title" id="tl" name="tl" value="<? echo convertToUTF($pp['tl']);?>" maxlength="500">
                            <input type="hidden" value="/lwdblog" name="p" id="p">
                            <input type="hidden" value="<? echo htmlentities($pp['bs'], ENT_QUOTES);?>" name="bs" id="bs">
                            <input type="hidden" value="434" name="len" id="len">
                            <input type="hidden" value="<? echo $pp['src'];?>" name="src" id="src">
                            <input type="hidden" value="false" name="e" id="e">
                            <input type="hidden" value="FullPage" name="type" id="type">
                            <input type="hidden" value="" name="from">
                            <input type="hidden" value="true" name="confirm">
                        </div>
                    </div>

                    <div class="row">
                        <div class="row-hd"><label for="nb">标签:</label></div>
                        <div class="row-bd">
                            <input id="nb" name="nb" value="网摘|">多标签以|号为间隔
                        </div>
                    </div>

                    <div class="row">
                        <div class="row-hd"></div>
                        <div class="row-bd">
                            <label for="ourl1"><input type="radio" id="ourl1" name="ourl" value="false" checked="true" onclick="selectionContent(this)">保存整个网页</label>
                            <label for="ourl2"><input type="radio" id="ourl2" name="ourl" value="true" onclick="selectionContent(this)">只保存网址</label>
                            <label for="ourl3" id="lb3" style="color: rgb(222, 222, 222);"><input type="radio" id="ourl3" name="ourl" value="false" onclick="selectionContent(this)" disabled="">保存正文</label>
                        </div>
                    </div>
                   <!--div class="row">
                        <div class="row-hd">添加注释</div>
                        <div class="row-bd">
                            <textarea  name="cmt" style="width:100%" value="${cmt}" >
                            </textarea>
                        </div>
                    </div-->
                    <div class="row btns-row" style="height:50px">
                        <input class="ydnwc-dialog-btn" name="sb" id="sb" type="submit" value="保 存">
                        <input class="ydnwc-dialog-btn ydnwc-dialog-btn-gray" type="button" name="cancelbtn" id="cancelbtn" value="取 消">
                    </div>

                </form>
                 <script type="text/javascript">
    <!--
    (function (){
        var  _$ = function(id){
            return document.getElementById(id);
        }
        var contenMode = window.name.substring(0,1);
        var parent_url = document.getElementById('src').value;
        //取到包括分割标识符正文已经整个网页的一个字符串
        var tempStr = document.getElementById('bs').value;
       //取到分割标识符所在位置
        var position = tempStr.lastIndexOf('$');
        //取到包含两个分割标识符的正个网页的字符串
        var allContent = tempStr.substring(0,position);
        //取到标识符
        var mark = tempStr.substring(position+1);
        var tempArr = allContent.split(mark);
        //正文
        var mainContent = tempArr.length > 1 ? tempArr[1] : allContent;
        //整个网页
        var fullPageContent = allContent.replace(mark,'');
        //隐藏文本控件
        var  _bsInput = _$('bs');
        //保存正文label
        var _lb3 = _$('lb3');
        //docType
        var _docType = _$('type');
        //checkbox控件
        var  _our1Check = _$('ourl1');
        var  _our2Check = _$('ourl2');
        var  _our3Check = _$('ourl3');
        if(contenMode ==='1'){
            _our3Check.disabled = true;
            _lb3.style.color = '#dedede';
            _$('new').style.display = 'none';
        }
        if(contenMode ==='2'){
            _our3Check.disabled = false;
            _our3Check.checked= 'true';
            _bsInput.value = mainContent;
        }
        function cancel(){
            _$('deleteForm').submit();
            croDomain.postMessage('remove', parent_url);
        }
        function selectionContent(obj){
            if(obj.id === 'ourl3'){
               croDomain.postMessage('creat', parent_url);
               _bsInput.value = mainContent;
               _docType.value = 'MainBody';
            }
            if(obj.id === 'ourl1' || obj.id === 'ourl2' ){
                croDomain.postMessage('remove', parent_url);
               _bsInput.value = fullPageContent;
               _docType.value = 'FullPage';
            }
        }
        //method=logout，参数有p，src，tl，bs，len，fpc，e
    
        window.selectionContent = function(e){
            selectionContent(e);
        };
    })();

    -->
    </script>