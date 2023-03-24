import "./button.css";

export const Button = ({ children, type, onClick }) => {
	return (
		<button className="button" type={type} onClick={onClick}>
			{children}
		</button>
	);
};
