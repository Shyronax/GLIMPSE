import "./button.css";

export const Button = ({ text, type, onClick }) => {
	return (
		<button className="button" type={type} onClick={onClick}>
			{text}
		</button>
	);
};
