document.addEventListener('DOMContentLoaded', function () {
	console.log('load')
	
	
	const arrow = document.getElementById('arrow')
	const formation = document.getElementById('formation')
	
	arrow.addEventListener('click', function(event){
		event.preventDefault();
		console.log('click')
		let formationY = formation.offsetTop;
		console.log(formationY)
		
		window.scroll(0, formationY)
	})
	

	
	
	//On stock les compétences et les %
	let competence = [{
			name: 'html',
			pourcentage: 80
		},
		{
			name: 'css',
			pourcentage: 75
		},
		{
			name: 'js',
			pourcentage: 60
		},
		{
			name: 'react',
			pourcentage: 30
		},
		{
			name: 'photoshop',
			pourcentage: 80
		},
		{
			name: 'illustrator',
			pourcentage: 70
		},
		{
			name: 'indesign',
			pourcentage: 90
		}];
	
	//pour récupérer la longueur du JSON
	let obj = Object.keys(competence).length
	
	//function pour définir la postion du scroll
	function isView(){
		let height = window.scrollY;
		if(height < 2647){
			
			return false
		}else if (height >= 2647){
			
			return true
		}
	}
	
	
	//addEventListener pour le scroll
	document.addEventListener('scroll', function(event){
		
		//Quand le scroll est au bon endroit 
		if (isView()){
			//on vérifie tout le json 
			for(let i = 0; i < obj; i++){
				
				//change le width
				let elem = document.getElementById(competence[i].name);
				elem.style.width = competence[i].pourcentage.toString() + '%'
			}
		}else{
			return false
		}
	})

	//on récupère les input de la page contact
	let name = document.getElementById('name')
	let email = document.getElementById('email')
	let message = document.getElementById('message')
	//le bouton envoyer
	let button = document.getElementById('sub')

	//quand on clique sur le boutton 
	button.addEventListener('click', function () {
		//on récupére les value
		let userName = name.value
		let userEmail = email.value
		let userMessage = message.value

		//on affiche dans la console
		console.log("L'utilisateur " + userName + " avec l'email " + userEmail + " a laissé le message : " + userMessage + ".")
	})

})