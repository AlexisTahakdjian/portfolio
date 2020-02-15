document.addEventListener('DOMContentLoaded', function () {



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
			};
		}else{
			return false
		}
	})
	
	const projects = document.getElementById('projects');
	let compteur = 3;

	function  afficherProjet(key) {

		const projet = document.createElement('div');
		projet.id = data[key].idadd;
		projet.classList.add("d-flex");
		projet.classList.add("flex-flow");
		projects.appendChild(projet);

		const partUn = document.createElement('div');
		partUn.classList.add("w-50");
		partUn.classList.add("margin-right-10");
		projet.appendChild(partUn);

		const lien = document.createElement('a')
		lien.href = data[key].url;
		lien.target = "_blank";
		partUn.appendChild(lien);

		const imageProjet = document.createElement('img');
		imageProjet.src = "./asset/img/" + data[key].photo + ".jpg";
		imageProjet.classList.add('img-100');
		lien.appendChild(imageProjet);

		const parDeux = document.createElement('div');
		parDeux.classList.add("w-50");
		parDeux.classList.add("margin-left-10");
		projet.appendChild(parDeux);

		const titreProjet = document.createElement('h2');
		const titre = document.createTextNode(data[key].titre);
		titreProjet.appendChild(titre);
		parDeux.appendChild(titreProjet)
		titreProjet.classList.add("gold");
		titreProjet.classList.add("font-size-title");

		const descriptionProjet = document.createElement('p');
		const textDescription = document.createTextNode(data[key].Description);
		descriptionProjet.appendChild(textDescription);
		descriptionProjet.classList.add("txt");
		parDeux.appendChild(descriptionProjet);

		const clientProjet = document.createElement("h4");
		const nomClient = document.createTextNode(data[key].nom);
		clientProjet.appendChild(nomClient);
		clientProjet.classList.add("gold");
		clientProjet.classList.add("font-size-title");
		parDeux.appendChild(clientProjet);

		const trafficLight = document.createElement('img');
		trafficLight.src = "asset/img/traffic-light/traffic_" + data[key].traffic +".svg";
		trafficLight.alt = data[key].traffic;
		trafficLight.classList.add("w-15");
		parDeux.appendChild(trafficLight);

	};

	let mesProjets = Object.keys(data).length;
	console.log("mesProjets", mesProjets);

	Object.keys(data).map(function(key, index) {
		if (index < compteur) {
			afficherProjet(key);
		}
	});
	
	function removeElement(elementId) {
		let element = document.getElementById(elementId);
		element.parentNode.removeChild(element);
	}


	const afficherPlus = document.createElement('button');
	afficherPlus.innerHTML = "Afficher plus";

	projects.appendChild(afficherPlus);

	afficherPlus.addEventListener("click", function(){
		if(compteur === 3){

			Object.keys(data).map(function(key, index) {
				if (index >= compteur) {
					afficherProjet(key);
				}
			});
			compteur = mesProjets;

			afficherPlus.innerHTML = "Afficher moins"
		} else{
			compteur = 3;
			Object.keys(data).map(function(key, index) {
				let id = data[key].idadd;
				if (index >= compteur ){
					removeElement(id)
				}
			})

			afficherPlus.innerHTML = "Afficher plus"

		}
	})




})