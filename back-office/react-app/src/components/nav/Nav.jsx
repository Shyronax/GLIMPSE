import "./nav.css";
import mcuoLogo from "../../img/logo-mcuo.png";
import { NavElement } from "./NavElement";
import { NavLink } from "react-router-dom";

export const Nav = () => {
    return (
        <section className="nav">
            <div className="nav__intro">
                <a
                    className="nav__website-link"
                    href="https://milleculturesuneorigine.but-mmi-champs.fr"
                    target="_blank"
                    rel="noopener noreferrer"
                >
                    <img src={mcuoLogo} alt="" className="nav__website-logo" />
                    <span>
                        Milles Cultures, <br />
                        une Origine
                    </span>
                </a>
                <h1 className="nav__title">administration</h1>
            </div>
            <nav className="nav__container">
                <ul className="nav__ul">
                    <li className="nav__li">
                        <NavLink to="/" isActive={(match, location) => match}>
                            {({ isActive }) => (
                                <NavElement isActive={isActive}>
                                    Statistiques
                                </NavElement>
                            )}
                        </NavLink>
                    </li>
                    <li className="nav__li">
                        <NavLink
                            to="/comptes"
                            isActive={(match, location) => match}
                        >
                            {({ isActive }) => (
                                <NavElement isActive={isActive}>
                                    Gestion des comptes
                                </NavElement>
                            )}
                        </NavLink>
                    </li>
                    <li className="nav__li">
                        <NavLink
                            to="/parametres"
                            isActive={(match, location) => match}
                        >
                            {({ isActive }) => (
                                <NavElement isActive={isActive}>
                                    Paramètres
                                </NavElement>
                            )}
                        </NavLink>
                    </li>
                </ul>
            </nav>
        </section>
    );
};
