import "./Graphique.css";
import { Line } from "react-chartjs-2";
import {
	Chart as ChartJS,
	LineElement,
	PointElement,
	LinearScale,
	CategoryScale,
	Tooltip,
	Legend,
} from "chart.js";

ChartJS.register(LineElement, PointElement, LinearScale, CategoryScale);

// Graphique de fréquentation (nombre de tickets par jour) du mois en cours
export const Graphique = ({ data }) => {
	const tabMois = [
		"Janvier",
		"Février",
		"Mars",
		"Avril",
		"Mai",
		"Juin",
		"Juillet",
		"Août",
		"Septembre",
		"Octobre",
		"Novembre",
		"Décembre",
	];

	const dateActuelle = new Date();

	// Avoir les jours d'un mois (axe des ordonnées du graphique)
	const getJoursDuMois = (mois, annee) => {
		var date = new Date(annee, mois, 1);
		var jours = [];
		while (date.getMonth() === mois) {
			let jour = new Date(date).toString().slice(8, 10);
			jours.push(jour);
			date.setDate(date.getDate() + 1);
		}
		return jours;
	};

	// Appeler la fonction pour avoir les jours du mois en cours (axe des abscisses du graphique)
	const joursDuMoisActuel = getJoursDuMois(
		dateActuelle.getMonth(),
		dateActuelle.getFullYear()
	);

	// Récupérer le nombre de tickets par jour ce mois-ci
	const chartNbTickets = joursDuMoisActuel.map((jour) => {
		let nbTickets = 0;
		data.forEach((d) => {
			if (d.jour_ticket.slice(8, 10) === jour) {
				nbTickets++;
			}
		});
		return nbTickets;
	});

	console.log(chartNbTickets);

	const dataTickets = {
		labels: joursDuMoisActuel,
		datasets: [
			{
				data: chartNbTickets,
				borderColor: "#365CBD",
				backgroundColor: "#365CBD",
				tension: 0.2,
			},
		],
	};

	const options = {
		responsive: true,
		plugins: {
			legend: {
				position: "top",
			},
			title: {
				display: true,
				text: "Statistiques de fréquentation",
			},
		},
		scales: {
			y: {
				min: 0,
				ticks: {
					stepSize: 1,
				},
			},
		},
	};

	return (
		<div className="graph">
			<Line data={dataTickets} options={options}></Line>
		</div>
	);
};
