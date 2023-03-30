import { useNavigate } from "react-router-dom";
import { Button } from "../components/buttons/Button";
import { useState } from "react";

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

            fetch("/back/api/utilisateurs", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify(body),
            })
                .then((response) => response.text())
                .then((data) => {
                    setStatus({
                        nb: data.status,
                        message: data.status_message,
                    });
                });
        }
    };

    return (
        <div className="contenu">
            <div className="title">
                <h1 className="title__element">Ajouter un utilisateur</h1>
                <p className="title__subtitle">
                    Ajouter un <strong>nouveau compte</strong> utilisateur.
                </p>
            </div>
            <form onSubmit={handleSubmit} className="form">
                {status ? (
                    <div>
                        <p className={status.nb == 1 ? "success" : "error"}>
                            {status.message}
                        </p>
                    </div>
                ) : (
                    <div style={{ height: "1rem" }}></div>
                )}
                <div className="form__champs">
                    <label className="form__label">Nom</label>
                    <input
                        className="form__input"
                        required
                        type="text"
                        value={nom}
                        onChange={(event) => setNom(event.target.value)}
                    />
                </div>
                <div className="form__champs">
                    <label className="form__label">Prénom</label>
                    <input
                        className="form__input"
                        required
                        type="text"
                        value={prenom}
                        onChange={(event) => setPrenom(event.target.value)}
                    />
                </div>
                <div className="form__champs">
                    <label className="form__label">Adresse e-mail</label>
                    <input
                        className="form__input"
                        required
                        type="email"
                        value={email}
                        onChange={(event) => setEmail(event.target.value)}
                    />
                </div>
                <div className="form__champs">
                    <label className="form__label">Mot de passe</label>
                    <input
                        className="form__input"
                        required
                        type="password"
                        value={mdp}
                        onChange={(event) => setMdp(event.target.value)}
                    />
                </div>
                <div className="form__champs">
                    <label className="form__label">
                        Confirmation du mot de passe
                    </label>
                    <input
                        className="form__input"
                        required
                        {...(!isMdpTheSame && { className: "error" })}
                        type="password"
                        value={mdpConfirm}
                        onChange={(event) => setMdpConfirm(event.target.value)}
                    />
                </div>
                <div className="form__links">
                    {goBack && (
                        <a onClick={() => navigate(-1)} className="goback-link">
                            Retour
                        </a>
                    )}
                    <Button type="submit">Valider</Button>
                </div>
            </form>
        </div>
    );
};
