import { BrowserRouter, Route, Routes, useLocation } from "react-router-dom"
import Header from './Components/Header'
import Footer from "./Components/Footer"
import { createTheme, CssBaseline, ThemeProvider } from "@mui/material"
import GlobalStyles, { Pallete } from "./globals/GlobalStyles"
import Home from "./Pages/Home"
import About from "./Pages/About"
import Login from "./Pages/Auth/Login"
import ForgotPassword from "./Pages/Auth/ForgotPassword"
import Calender from "./Pages/Calender"
import { AuthProvider } from "./Context/AuthContext"
import PrivateRoute from "./Routes/PrivateRoute"
import Register from "./Pages/Auth/Register/index.jsx"

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
                <AuthProvider>
                    {shouldShowHeader && <Header />}

                    <Routes>
                        <Route path="/" element={<PrivateRoute><Home /></PrivateRoute>} />
                        <Route path="/sobre" element={<PrivateRoute><About /></PrivateRoute>} />
                        <Route path="/entrar" element={<Login />} />
                        <Route path="/cadastrar" element={<Register />} />
                        <Route path="/esqueceu" element={<ForgotPassword />} />
                        <Route path="/calendario" element={<PrivateRoute><Calender /></PrivateRoute>} />

                    </Routes>
                </AuthProvider>

                <Footer />
            </ThemeProvider>
        </>
    )
}

export default App
