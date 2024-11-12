import { AppProvider } from '@toolpad/core/AppProvider';
import { SignInPage } from '@toolpad/core/SignInPage';
import { useTheme } from '@mui/material/styles';
import { PageContainer } from '../../../globals/styles';
import { Alert, Button, InputAdornment, TextField } from '@mui/material';
import { AccountCircle } from '@mui/icons-material';
import { useEffect, useState } from 'react';
import Header from '../../../Components/Auth/Header';

const providers = [{ id: 'passkey', name: 'Passkey' }];

function CustomButton() {
    return (
        <Button
            type="submit"
            variant="contained"
            color="primary"
            size="small"
            disableElevation
            fullWidth
            sx={{ my: 2 }}
        >
            Recuperar Acesso
        </Button>
    );
}

function CustomEmailField({ register, errors, showForgotMessage }) {

    return (
        <>
            {showForgotMessage && <><Alert sx={{ display: 'flex', justifyContent: 'center' }} severity="info">E-mail enviado</Alert>
                <br /></>}
            <TextField
                id="input-with-icon-textfield"
                label="Email"
                type="email"
                size="small"
                required
                fullWidth
                InputProps={{
                    startAdornment: (
                        <InputAdornment position="start">
                            <AccountCircle fontSize="inherit" />
                        </InputAdornment>
                    ),
                }}
                variant="outlined"
            />
        </>

    );
}




const TranslatePage = () => {
    document.querySelector('h5').innerHTML = 'Esqueceu sua senha?';
    document.querySelectorAll('p').forEach(el => {
        if (el.innerHTML.includes("Welcome")) {
            el.innerHTML = "Digite o e-mail utilizado na conta.";
        }
    });

    document.querySelectorAll('span').forEach(el => {
        if (el.innerHTML.includes("Remember")) {
            el.innerHTML = "Relembrar acesso";
        }
    });
}

export default function ForgotPassword() {

    const [showForgotMessage, setShowForgotMessage] = useState(false);

    useEffect(() => {
        TranslatePage();
    }, []);

    const onSubmit = async (formData) => {
        setShowForgotMessage(true)
    };

    const theme = useTheme();
    return (
        <>
        <Header/>
        <PageContainer>
            <AppProvider theme={theme}>
                <SignInPage signIn={(provider, formData) =>
                    onSubmit(formData)
                } providers={providers} slots={{
                    submitButton: CustomButton,
                    emailField: (props) => <CustomEmailField showForgotMessage={showForgotMessage} />,

                }} />
            </AppProvider>
        </PageContainer>
        </>
    );
}