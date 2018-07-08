function loginbox(){
	document.getElementById('login').style.visibility='visible';
	document.getElementById('login').className ='drop';
	document.getElementById('wrap').classList.add('leftclick');
}

function signupbox(){
	document.getElementById('Signup').style.visibility='visible';
	document.getElementById('Signup').style.opacity='1';
	document.getElementById('Signup').className ='drop';
	document.getElementById('wrap').classList.add('leftclick');			
}

function forgotpass(){
	document.getElementById('login').style.visibility='hidden';
	document.getElementById('forgot').style.visibility='visible';
	document.getElementById('forgot').className ='drop';
	document.getElementById('forgot').style.opacity='1';
}

function wrongpass(){
	document.getElementById('wrap').classList.add('leftclick');
	document.getElementById('wrong').style.visibility='visible';
	document.getElementById('wrong').style.opacity='1';
	document.getElementById('wrong').className ='drop';
}

function changepass(){
	document.getElementById('wrap').classList.add('leftclick');
	document.getElementById('change').style.visibility='visible';
	document.getElementById('change').style.opacity='1';
	document.getElementById('change').className ='drop';
}

function pdetails(){
	document.getElementById('edit-content').style.visibility='visible';
	document.getElementById('edit-cont').style.visibility='hidden';
	document.getElementById('ed-cont').style.visibility='hidden';
}

function adetails(){
	document.getElementById('edit-content').style.visibility='hidden';
	document.getElementById('edit-cont').style.visibility='visible';
	document.getElementById('ed-cont').style.visibility='hidden';
}

function cvdetails(){
	document.getElementById('edit-content').style.visibility='hidden';
	document.getElementById('edit-cont').style.visibility='hidden';
	document.getElementById('ed-cont').style.visibility='visible';
}
 