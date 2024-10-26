import { BrowserRouter, Route, Routes, useLocation } from "react-router-dom"
import Header from './Components/Header'
import Footer from "./Components/Footer"
import { createTheme, CssBaseline, ThemeProvider } from "@mui/material"
import GlobalStyles, { Pallete } from "./globals/GlobalStyles"
import Home from "./Pages/Home"
import About from "./Pages/About"
import Login from "./Pages/Auth/Login"

const theme = createTheme({
    palette: {
        mode: 'dark',
        primary: {
            main: Pallete.primary,
        },
        secondary: {
            main: Pallete.secondary,  
        },
    },

    MuiInputBase: {
        styleOverrides: {
            root: {
                "&:has(> input:-webkit-autofill)": {
                    backgroundColor: "red",
                },
            },
        },
    },
});

function App() {
    return (
        <BrowserRouter>
            <Main />
        </BrowserRouter>
    );
}

function Main() {

    const location = useLocation();
    const hiddenHeaderRoutes = ["/entrar", "/cadastro"];

    const shouldShowHeader = !hiddenHeaderRoutes.includes(location.pathname);
    return (
        <>
            <ThemeProvider theme={theme}>

                <CssBaseline />
                <GlobalStyles />
                {shouldShowHeader && <Header />}

                <Routes>
                    <Route path="/" element={<Home />} />
                    <Route path="/sobre" element={<About />} />
                    <Route path="/entrar" element={<Login />} />
                </Routes>

                <Footer />
            </ThemeProvider>
        </>
    )
}

export default App
