import { useNavigate } from "react-router-dom";
import { Button } from "../components/buttons/Button";
import { useState, useEffect } from "react";

export const AddUser = ({ goBack }) => {
	const navigate = useNavigate();

	// Déclaration des variables d'état
	const [nom, setNom] = useState("");
	const [prenom, setPrenom] = useState("");
	const [email, setEmail] = useState("");
	const [mdp, setMdp] = useState("");
	const [mdpConfirm, setMdpConfirm] = useState("");
	const [status, setStatus] = useState({});

	const isMdpTheSame = mdp === mdpConfirm;

	// Fonction de soumission du formulaire
	const handleSubmit = async (e) => {
		e.preventDefault();

		if (nom == "" || prenom == "" || email == "" || mdp == "") {
			setStatus({
				nb: 0,
				message: "Veuillez remplir tous les champs.",
			});
		} else if (!isMdpTheSame) {
			setStatus({
				nb: 0,
				message: "Les mots de passe ne sont pas identiques.",
			});
		} else {
			const body = {
				nom,
				prenom,
				email,
				mdp,
			};

			fetch("/github/glimpse/back-office/back/api/utilisateurs", {
				method: "POST",
				headers: {
					"Content-Type": "application/json",
				},
				body: JSON.stringify(body),
			})
				.then((response) => response.text())
				.then((data) => {
					// setStatus({
					// 	nb: data.status,
					// 	message: data.status_message,
					// });
					console.log(data);
				});
		}
	};

	return (
		<div>
			<h1>Ajouter un utilisateur</h1>
			<form onSubmit={handleSubmit}>
				{status ? (
					<div>
						<p className={status.nb == 1 ? "success" : "error"}>
							{status.message}
						</p>
					</div>
				) : (
					<div style={{ height: "1rem" }}></div>
				)}

				<label>
					nom:
					<input
						required
						type="text"
						value={nom}
						onChange={(event) => setNom(event.target.value)}
					/>
				</label>
				<label>
					prenom:
					<input
						required
						type="text"
						value={prenom}
						onChange={(event) => setPrenom(event.target.value)}
					/>
				</label>
				<label>
					email:
					<input
						required
						type="email"
						value={email}
						onChange={(event) => setEmail(event.target.value)}
					/>
				</label>

				<label>
					mdp:
					<input
						required
						type="password"
						value={mdp}
						onChange={(event) => setMdp(event.target.value)}
					/>
					confirmation:
					<input
						required
						{...(!isMdpTheSame && { className: "error" })}
						type="password"
						value={mdpConfirm}
						onChange={(event) => setMdpConfirm(event.target.value)}
					/>
				</label>

				{goBack && <a onClick={() => navigate(-1)}>Retour</a>}
				<Button type="submit">Valider</Button>
			</form>
		</div>
	);
};
