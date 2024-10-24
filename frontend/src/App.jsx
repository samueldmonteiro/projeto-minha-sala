import { BrowserRouter, Route, Routes } from "react-router-dom"
import Header from './Components/Header'
import Footer from "./Components/Footer"
import { createTheme, CssBaseline, ThemeProvider } from "@mui/material"
import GlobalStyles from "./globals/GlobalStyles"
import Home from "./Pages/Home"
import About from "./Pages/About"

const theme = createTheme({
    palette: {
        primary: {
            main: '#f75421',  // Define a cor primária (para o botão primário, por exemplo)
        },
        secondary: {
            main: '#4caf50',  // Define a cor secundária
        },
        appBar: {
            main: '#f75421',  // Define a cor da AppBar (caso você queira uma cor específica)
        },
    },
    components: {
        MuiAppBar: {
            styleOverrides: {
                root: {
                    backgroundColor: '#f75421',  // Cor customizada da AppBar
                },
            },
        },
    },
});

function App() {

    return (
        <>
            <BrowserRouter>
                <ThemeProvider theme={theme}>

                    <CssBaseline />
                    <GlobalStyles />
                    <Header />

                    <Routes>
                        <Route path="/" element={<Home />} />
                        <Route path="/sobre" element={<About />} />

                    </Routes>

                    <Footer />
                </ThemeProvider>
            </BrowserRouter>
        </>
    )
}

export default App
