import "./Button.css";

export const Actions = ({ action, onClick }) => {
	return (
		<button
			className="actions__btn"
			type="button"
			action={action}
			onClick={onClick}
		>
			{action}
		</button>
	);
};
