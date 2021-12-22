     


     window.addEventListener('scroll',()=>{
       const scrollable=document.documentElement.scrollHeight-window.innerHeight;
       const scrolled=window.scrollY;
       if (Math.ceil(scrolled)==scrollable) {
        alert('أنت في أخر الصفحه');
       }
     });


 function modalscript(){
     var largImageGalley=document.getElementById('largImageGalley');
     var modalImage=document.getElementById('modalImage');
     var imageProfile=document.getElementById('imageProfile');
     var modalProfile=document.getElementById('modalProfile');
     var modalName=document.querySelector('.nameProfile');
     var imageName=document.getElementById('imageName');
     var modalTitle=document.getElementById('modalTitle');
     var modalDescription=document.getElementById('modalDescription');
     var titleImage=document.getElementById('titleImage');
 	// Change BigImage In Modal
 	 modalImage.src=largImageGalley.src;
 	// Change Image Profiel
    modalProfile.src=imageProfile.src;
    // Change Name Profile
    modalName.innerHTML=imageName.innerHTML;
    // Change Title
    modalTitle.innerHTML=titleImage.innerHTML;
    
   

 	
 	
 	
 	// 
 	

 }
 // // Like 
 // var like=document.querySelector('.likeModel');
 // like.addEventListener("click", likee); 

 // function likee(e){
 // 	e.preventDefault();
 // 	var count=0;
 // 	if (count==0) {
 //     like.style.color='black';
 // 	 like.style.background='white'
 // 	}else{
 // 		like.style.color='red';
 // 	 like.style.background='white'
 // 	}
 	
 // }
 



 






// Archife
function archif(){
    var archive=document.querySelector('.archive');
    if (archive.style.color=='white') {
         archive.style.color='black';
    }else{
      archive.style.color='white';
      
    }
   
   }

      

