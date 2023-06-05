import NavBar from "./Navbar"
import Footer from "./Footer"

export default function Layout({ children }) {
	return (
		<>
			<NavBar/>
			{children}
			<Footer/>
		</>
	)
}
