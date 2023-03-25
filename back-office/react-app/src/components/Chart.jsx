import "./Chart.css";
import { Line } from "react-chartjs-2";
import {
	Chart as ChartJS,
	LineElement,
	PointElement,
	LinearScale,
	CategoryScale,
	Tooltip,
	Title,
} from "chart.js";

ChartJS.register(
	LineElement,
	PointElement,
	LinearScale,
	CategoryScale,
	Title,
	Tooltip
);

// Graphique de fréquentation (nombre de tickets par jour) du mois en cours
export const Chart = ({ data }) => {
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

	// Récupérer le mois en cours (format texte)
	const moisActuelTxt = tabMois[dateActuelle.getMonth()];

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

	const dataTickets = {
		labels: joursDuMoisActuel,
		datasets: [
			{
				data: chartNbTickets,
				borderColor: "#365CBD",
				backgroundColor: "#365CBD",
				tension: 0.2,
				pointRadius: 1.8,
			},
		],
	};

	const options = {
		responsive: true,
		plugins: {
			title: {
				display: true,
				text:
					"Statistiques de fréquentation du mois de " +
					moisActuelTxt +
					" " +
					dateActuelle.getFullYear(),
			},
		},
		scales: {
			x: {
				title: {
					text: "Jours",
					display: true,
				},
			},
			y: {
				min: 0,
				suggestedMax: 3,
				ticks: {
					stepSize: 1,
				},
				title: {
					text: "Nombre de réservations",
					display: true,
				},
			},
		},
		tooltip: {
			enabled: true,
		},
	};

	return (
		<div className="graph">
			{/* <div className="graph__mois">
				<h3>
					{moisActuelTxt} {dateActuelle.getFullYear()}
				</h3>
			</div> */}

			<Line data={dataTickets} options={options}></Line>
		</div>
	);
};
