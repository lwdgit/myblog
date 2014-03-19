function go(url, args, retid, ret) {
	$.ajax({
		url : url,
		data : args,
		type : "GET",
		beforeSend : function () {/*alert(args);*/},
		success : function (msg) {
			$(retid).html(msg);
			ret();
		}
	});
	return false;
}

function submitext(formid, retid, url, ret) {
	$.ajax({
		url : url,
		data : $(formid).serialize(),
		type : "POST",
		beforeSend : function () {
		
		},
		success : function (msg) {

			$(retid).html(msg);
			ret();
		}
	});
	return false;
}

function favor(id) {
	$.get("article.php", {
		article : id,
		hot : 1
	}, function () {
		var a = parseInt($("#hot" + id).text()) + 1;
		$("#hot" + id).text(a.toString());
	}, 'text');
}
function commentsub(formid, retid, url,id)
{
		submitext(formid, retid, url) ;
		var a = parseInt($("#comment" + id).text()) + 1;
		$("#comment" + id).text(a.toString());
}
function replyfor($id, i) {
	var a = $id.parent().parent().parent();
	a.find(".innerm").val("回复" + i + "楼:");
}

function comment(id) {

	if ($(id).has(".article_list_reply").length)
		closecm(id);
	else {
		var url = "article_list_relpy.php?getcomment=" + id.substring(8, id.Length);
		submitext('', id, url, function () {
			$(id).slideDown(500);
		});
	}
}

function closecm(id) {
	$(id).slideUp(500, function () {
		$(id).empty();
	});
}

function af() {
myAnim("slideInRight",1);
}

function bf() {
	$blog.ani.animate({
		left : '0px',
		width : '920px',
		opacity : '1'
	}, 500);
}

function anigo(url, args)
{
$blog.left.animate({
		opacity : '0'
	}, 300, function () {
		go(url,args,'#ajaxcontent', af);
	});
	bf();
}
function myAnim(x,i) {
    $('#ajaxcontent').removeClass().addClass(x + ' animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
  	if(i===1)
  	$(this).removeClass();
    });
  };

function setActive(url)
{
	if(url.indexOf("about")!=-1)
		{
			$blog.nav.find(".active").removeClass("active");
		    $('#nav #4').addClass("active");
		}
		else if(url.indexOf("photo")!=-1)
		{
			$blog.nav.find(".active").removeClass("active");
		    $('#nav #3').addClass("active");
		}
		else if(url.indexOf("article")!=-1)
		{
			$blog.nav.find(".active").removeClass("active");
		    $('#nav #2').addClass("active");
		}
		else
		{
			$blog.nav.find(".active").removeClass("active");
		    $('#nav #1').addClass("active");
		}

}

function run1(state)
{
	if(!window.ActiveXObject){ 
	   history.pushState(state, document.title,state.href);
	}
	myAnim("slideOutLeft",0);
          go('controller.php',state.href.substr(state.href.lastIndexOf("?")+1), '#ajaxcontent',  af);
          document.title = "我的轻博客--"+state.title;
	return false;
}

$('#nav a').live('click', function () {
	$blog.nav.find(".active").removeClass("active");
	this.parentElement.className = 'active';
	return run1( { href: $(this).attr('href'),title: $(this).attr('title')});
});

$('#nav_bar a').live('click', function () {
	return run1( { href: $(this).attr('href'),title: $(this).attr('title')});
});

$('#article_listt  a').live('click', function () {
	return run1( { href: $(this).attr('href'),title: $(this).text()});
});

$('#article_listm  #title a').live('click', function () {
	return run1( { href: $(this).attr('href'),title: $(this).text()});
});

 $(document).ready(function () {
 window.$blog =
{
    sidebar:$(".sidebar"),
    gotopbtn:$("#gotopbtn"),
	left:$("#left"),
	nav:$("#nav"),
	ani:$("#animate"),
};
 //resize();
 //$(window).load(function(){
	var url = 'http://chaxun.1616.net/s.php?type=ip&output=json&callback=?&_=' + Math.random();
	$.getJSON(url, function (data) {
		$("#AddrMessage").val(data.Isp);
	});

	$(window).scroll(function () {
		if ($(document).scrollTop() > 105) {
		//	$blog.sidebar.addClass("follow");
			$blog.ani.css('top','10px');
		} else if ($(document).scrollTop() < 105) {
		//	$blog.sidebar.removeClass("follow");
			$blog.ani.css('top','100px');
		}

		$(window).scrollTop() > 500 ? $blog.gotopbtn.css('display',''):$blog.gotopbtn.css('display','none');
	});
     document.getElementById('blog_main').style.height=(document.body.clientHeight-70)+"px";
   
//});/* winload */

window.addEventListener('popstate', function(evt){
var state=evt.state;
if(state.href=='')return;
document.title="我的轻博客--"+state.title;
myAnim("slideOutLeft",0);
go('controller.php',state.href.substr(state.href.lastIndexOf("?")+1), '#ajaxcontent',  af);
setActive(state.href);
}, false);
});/*document_ready*/

$("#gotopbtn").live('click', function (){
            $('body').animate({scrollTop:'0'},800);
        });

function resize()
{
width=1008;
bs=1.4;
$(".clearfix").css('zoom',bs);
}
