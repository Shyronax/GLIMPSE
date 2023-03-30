import { useState, useContext } from "react";
import { AuthContext } from "../context/AuthContext";
import { Button } from "../components/buttons/Button";
import "./login.css";

export const Login = () => {
    const [email, setEmail] = useState("");
    const [mdp, setMdp] = useState("");
    const [error, setError] = useState("");
    const authContext = useContext(AuthContext);

    const handleSubmit = async (e) => {
        e.preventDefault();
        fetch("/back/login.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({
                email,
                mdp,
            }),
        })
            .then((response) => response.json())
            .then((data) => {
                if (data.status == 1) {
                    authContext.login();
                } else {
                    setError(data.status_message);
                }
            });
    };

    return (
        <main className="main-login">
            <section className="admin">
                <h1 className="admin__title">
                    Mille Cultures, <br />
                    une Origine
                </h1>
                <p className="admin__text">Administration</p>
            </section>
            <section className="auth">
                <div className="auth__bloc">
                    <h1 className="auth__title">Authentification</h1>
                    <form onSubmit={handleSubmit} className="auth__form">
                        {error ? (
                            <div className="error auth__error">
                                <p>{error}</p>
                            </div>
                        ) : (
                            <div style={{ height: "1rem" }}></div>
                        )}
                        <div className="auth__champs">
                            <label className="auth__label">
                                Adresse e-mail
                            </label>
                            <input
                                className="auth__input"
                                type="text"
                                value={email}
                                onChange={(event) =>
                                    setEmail(event.target.value)
                                }
                            />
                        </div>
                        <div className="auth__champs">
                            <label className="auth__label">Mot de passe</label>
                            <input
                                className="auth__input"
                                type="password"
                                value={mdp}
                                onChange={(event) => setMdp(event.target.value)}
                            />
                        </div>
                        <div className="auth__site">
                            <a
                                className="auth__website-link"
                                href="https://milleculturesuneorigine.but-mmi-champs.fr"
                                target="_blank"
                                rel="noopener noreferrer"
                            >
                                Aller sur le site principal
                            </a>
                            <Button type="submit">Se connecter</Button>
                        </div>
                    </form>
                </div>
            </section>
        </main>
    );
};
