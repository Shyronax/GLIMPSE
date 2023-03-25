import { useNavigate } from "react-router-dom";
import { Button } from "../components/buttons/Button";
import { useState, useEffect } from "react";

export const AddUser = ({ goBack }) => {
	const navigate = useNavigate();

	// Déclaration des variables d'état
	const [pseudo, setPseudo] = useState("");
	const [email, setEmail] = useState("");
	const [mdp, setMdp] = useState("");
	const [mdpConfirm, setMdpConfirm] = useState("");
	const [status, setStatus] = useState({});

	const isMdpTheSame = mdp === mdpConfirm;

	// Fonction de soumission du formulaire
	const handleSubmit = async (e) => {
		e.preventDefault();

		if (pseudo == "" || email == "" || mdp == "") {
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
				pseudo,
				email,
				mdp,
			};

			fetch(
				"http://localhost/github/glimpse/back-office/back/api/utilisateurs",
				{
					method: "POST",
					headers: {
						"Content-Type": "application/json",
					},
					body: JSON.stringify(body),
				}
			)
				.then((response) => response.json())
				.then((data) => {
					setStatus({
						nb: data.status,
						message: data.status_message,
					});
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
					login:
					<input
						required
						type="text"
						value={pseudo}
						onChange={(event) => setPseudo(event.target.value)}
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
