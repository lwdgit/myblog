
 var b=-1;
 var len=1;
 var c="";
 var flag=0;
 var id='';
 var times=0;
 var ent=0;
 var postdata='';
var i=0;
var a="";
var timer=self.setInterval("clock()",30);

function clock()
 {
   b++;
     if (b+len>= a.length) {
                   timer=window.clearInterval(timer);
      }

	  c=a.substring(b, b+len);
	if(c=="<")
	{
	len = a.indexOf(">", b)-b;
	c=a.substring(b, b+len+1);
	if(c.indexOf("<input",0)==0){
	flag=1;
	start=c.indexOf('id',0)+4;
	end=c.indexOf('\'',start);
	id=c.substring(start,end);
  timer=window.clearInterval(timer);
	}
	b+=len;
	len=1;
	}
  $("#pcontainer").append(c);
  	  if(flag==1)
	  {
					 $('#'+id)[0].focus();
					 flag=0;
	  } 
  }

  function login_fuc()
  {
  			ent++;
				if($("#"+id).val()==''){
				$("#"+id).attr("disabled","disabled");
				if(id=='name'||id=='password')
				{	
				$("#"+id).attr("id",id+ent);
				 $("#pcontainer").append("<br>please input your "+id+":");
				  $("#pcontainer").append(c);
				   $('#'+id)[0].focus();
				 }
				 else if(id=='check')
				 {
				 $("#"+id).attr("id",id+ent);
				 $("#pcontainer").append("<br>please input:<? echo $a.'+'.$b.'='?>");
				  $("#pcontainer").append(c);
				   $('#'+id)[0].focus();
				 }
				 else $("#pcontainer").append("<br>inner error!");	
				}
				else
				{    
				postdata+=(id+"="+$("#"+id).val()+"&");	
				times++;
				$("#"+id).attr("disabled","disabled");
				$("#"+id).attr("id",id+ent);
				timer=self.setInterval("clock()",50);
				}
				
				  		 if(times>=3){
		 timer=window.clearInterval(timer);
		 $.post('sub.php',postdata.substring(0,postdata.length-1),function (resultData){
		   if(resultData.indexOf("login pass",0)>-1){
		   $("#pcontainer").append("<br>login success!<br>re-directing...");
		   self.setInterval("window.location.href='index.php'",800);
		   }
		   else if(resultData.indexOf("much",0)>1)
		   {
		   			$("#pcontainer").append(resultData+"<br>");
		   }
		   else
		  { 
				$("#pcontainer").append(resultData+"<br>");
				$("#"+id).attr("disabled","disabled");
				$("#"+id).attr("id",id+ent);
				init();
				b=81;
				timer=self.setInterval("clock()",50);	
		     }
			},'text');
              times=2;
		 }
  
  }

  
 $(document).ready(function(){
		init();
      $(this).keypress(function (e) {
        switch (e.which) {
            case 13: 
				login_fuc();
                break;
        }

    });

 var win = ($.browser.msie) ? document : window;
	 $(win).click(function(e)
	 {
		 $('#'+id)[0].focus();
	 }
	 ); 
});
