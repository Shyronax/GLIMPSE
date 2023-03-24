import "./App.css";

import { useContext } from "react";
import { AuthContext } from "./context/AuthContext";
import { Accounts } from "./pages/Accounts";
import { Settings } from "./pages/Settings";
import { Stats } from "./pages/Stats";
import { Profile } from "./pages/Profile";
import { Button } from "./components/buttons/Button";
import { Login } from "./components/Login";
import { Nav } from "./components/nav/Nav";
import { BrowserRouter as Router, Routes, Route } from "react-router-dom";

function App() {
	const { isAuthenticated, logout } = useContext(AuthContext);
	return isAuthenticated ? (
		<Router>
			<Nav />
			<Button type="button" onClick={logout}>
				Déconnexion
			</Button>
			<Routes>
				<Route path="/" element={<Stats />} />
				<Route path="/parametres" element={<Settings />} />
				<Route path="/comptes" element={<Accounts />} />
				<Route path="/compte/:id" element={<Profile />} />
			</Routes>
		</Router>
	) : (
		<Login />
	);
}

export default App;
