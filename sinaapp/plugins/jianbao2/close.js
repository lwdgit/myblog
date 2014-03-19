  function openWin(obj,href)
         {
             obj.target="_blank";
             obj.href = href;
             obj.click();
         }

var cancelbtn = document.getElementById('cancelbtn');
if (cancelbtn) {
    cancelbtn.onclick = closeFrame;
}

 function closeFrame(){
    var parent_url = document.getElementById('src1').value;
    croDomain.postMessage('close',parent_url);    
    return false;
 }


document.getElementById('close').onclick = closeFrame;
document.getElementById('close1').onclick = function()
{
	openWin(this,this.href);
	closeFrame();
};
