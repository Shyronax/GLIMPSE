import { Graphique } from "../components/Graphique";
import { Info } from "../components/info/Info";
import { useEffect, useState } from "react";
import "./stats.css";

export const Stats = () => {
	// Récupérer les données de réservations par l'API
	let [data, setData] = useState([]);

	useEffect(() => {
		fetch("http://localhost/github/glimpse/back-office/back/api/tickets")
			.then((response) => response.json())
			.then((data) => setData(data));
	}, []);

	// Afficher le nombre de tickets total, du mois en cours et d'aujourd'hui (infos à côté du graphique)
	const dateActuelle = new Date();

	const moisActuelNum = dateActuelle.toISOString().slice(5, 7);
	const jourActuelNum = dateActuelle.toISOString().slice(8, 10);

	const nbTicketsTotal = data.length;
	const nbTicketsCeMois = data.filter(
		(d) => d.jour_ticket.slice(5, 7) === moisActuelNum
	).length;
	const nbTicketsCeJour = data.filter(
		(d) => d.jour_ticket.slice(8, 10) === jourActuelNum
	).length;

	return (
		<div>
			<div className="intro">
				<h1>Bonjour admin,</h1>
				<p>
					Voici les <strong>statistiques de fréquentation</strong> de
					l'exposition.
				</p>
			</div>
			<div className="content">
				<Graphique data={data} />
				<div className="infos">
					<Info number={nbTicketsTotal} text={"Réservations totales"} />
					<Info number={nbTicketsCeMois} text={"Réservations ce mois-ci"} />
					<Info number={nbTicketsCeJour} text={"Réservations aujourd'hui"} />
				</div>
			</div>
		</div>
	);
};
