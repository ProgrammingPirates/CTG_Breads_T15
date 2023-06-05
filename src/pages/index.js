import Head from "next/head"
import MetaMask from "../components/MetaMask"

export default function Home() {
	return (
		<>
			<Head>
				<title>Homepage</title>

				<meta
					name="viewport"
					content="width=device-width, initial-scale=1"
				/>
				<link rel="icon" href="/favicon.ico" />

			</Head>
			<main className="py-1 text-white bg-gray-900">
				<div className="text-2xl font-bold text-center"></div>
				<div className="grid h-screen bg-blue-500 place-items-center">

				</div>
			</main>
		</>
	)
}
