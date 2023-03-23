import { useState, useEffect } from "react";
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

export const Graphique = () => {
	let [data, setData] = useState([]);

	useEffect(() => {
		fetch("http://localhost/github/glimpse/back-office/back/api/tickets")
			.then((response) => response.json())
			.then((data) => setData(data));
	}, []);

	const joursTicket = [data.map((d) => d.jour_ticket)];
	const dateActuelle = new Date();
	const moisActuel = dateActuelle.toISOString().slice(5, 7);
	const filteredTicket = joursTicket.map((d) =>
		d.filter((e) => e.slice(5, 7) === moisActuel)
	);

	const dataTickets = {
		labels: ["23 Mars", "24 Mars", "25 Mars", "26 Mars", "27 Mars", "28 Mars"],
		datasets: [
			{
				data: [3, 2, 1, 4, 5, 6],
				borderColor: "rgb(255, 99, 132)",
				backgroundColor: "rgba(255, 99, 132)",
				tension: 0.3,
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
	};

	return (
		<div>
			<Line data={dataTickets} options={options}></Line>
		</div>
	);
};
