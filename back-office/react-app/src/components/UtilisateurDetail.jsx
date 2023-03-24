import { useNavigate } from "react-router-dom";
import { Button } from "./buttons/Button";
import { useState, useEffect } from "react";

export const UtilisateurDetail = ({ dataGET, goBack }) => {
	const navigate = useNavigate();

	// Déclaration des variables d'état
	const [pseudo, setPseudo] = useState("");
	const [email, setEmail] = useState("");
	const [mdp, setMdp] = useState("");
	const [status_message, setStatus_message] = useState("");

	// Afficher les données de l'utilisateur
	useEffect(() => {
		setPseudo(dataGET.pseudo_utilisateur || "");
		setEmail(dataGET.email_utilisateur || "");
	}, [dataGET.pseudo_utilisateur, dataGET.email_utilisateur]);

	// Fonction de soumission du formulaire
	const handleSubmit = async (e) => {
		e.preventDefault();

		const body = {
			pseudo,
			email,
		};

		if (dataGET.id_utilisateur == 1) {
			body.mdp = mdp;
		}

		fetch(
			"http://localhost/github/glimpse/back-office/back/api/utilisateur/" +
				dataGET.id_utilisateur,
			{
				method: "PUT",
				headers: {
					"Content-Type": "application/json",
				},
				body: JSON.stringify(body),
			}
		)
			.then((response) => response.json())
			.then((data) => {
				setStatus_message(data.status_message);
			});
	};

	return (
		<form onSubmit={handleSubmit}>
			{status_message && <p>{status_message}</p>}
			<label>
				login:
				<input
					type="text"
					value={pseudo ? pseudo : dataGET.pseudo_utilisateur}
					onChange={(event) => setPseudo(event.target.value)}
				/>
			</label>
			<label>
				email:
				<input
					type="email"
					value={email}
					onChange={(event) => setEmail(event.target.value)}
				/>
			</label>
			{dataGET.id_utilisateur == 1 && (
				<label>
					mdp:
					<input
						type="password"
						value={mdp}
						onChange={(event) => setMdp(event.target.value)}
					/>
				</label>
			)}
			{goBack && <a onClick={() => navigate(-1)}>Retour</a>}
			<Button type="submit">Modifier</Button>
		</form>
	);
};
