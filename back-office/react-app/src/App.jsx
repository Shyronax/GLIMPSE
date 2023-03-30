import "./App.css";

import { useContext } from "react";
import { AuthContext } from "./context/AuthContext";
import { Login } from "./pages/Login";
import { Accounts } from "./pages/Accounts";
import { Settings } from "./pages/Settings";
import { Stats } from "./pages/Stats";
import { Profile } from "./pages/Profile";
import { AddUser } from "./pages/AddUser";
import { Button } from "./components/buttons/Button";
import { Nav } from "./components/nav/Nav";
import { BrowserRouter as Router, Routes, Route } from "react-router-dom";

function App() {
	const { isAuthenticated, logout } = useContext(AuthContext);
	return isAuthenticated ? (
		<main className="main">
			<Router>
				<Nav />
				<Button type="button" onClick={logout} variant="disconnect">
					Déconnexion
				</Button>
				<Routes>
					<Route path="/" element={<Stats />} />
					<Route path="/parametres" element={<Settings />} />
					<Route path="/comptes" element={<Accounts />} />
					<Route path="/comptes/ajouter" element={<AddUser goBack />} />
					<Route path="/compte/:id" element={<Profile />} />
				</Routes>
			</Router>
		</main>
	) : (
		<main>
			<Login />
		</main>
		
	);
}

export default App;
