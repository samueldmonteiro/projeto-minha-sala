import { BrowserRouter, Route, Routes, useLocation } from "react-router-dom"
import Header from './Components/Header'
import Footer from "./Components/Footer"
import { createTheme, CssBaseline, ThemeProvider } from "@mui/material"
import GlobalStyles, { Pallete } from "./globals/GlobalStyles"
import Home from "./Pages/Home"
import About from "./Pages/About"
import Login from "./Pages/Auth/Login"
import ForgotPassword from "./Pages/Auth/ForgotPassword"
import Register from "./Pages/Auth/Register"
import Calender from "./Pages/Calender"

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
    const hiddenHeaderRoutes = ['/entrar', '/cadastrar', '/esqueceu'];

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
                    <Route path="/cadastrar" element={<Register />} />
                    <Route path="/esqueceu" element={<ForgotPassword />} />

                    <Route path="/calendario" element={<Calender />} />

                </Routes>

                <Footer />
            </ThemeProvider>
        </>
    )
}

export default App
