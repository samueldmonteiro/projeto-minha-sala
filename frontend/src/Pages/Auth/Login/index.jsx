import {
    Button,
    FormControl,
    InputLabel,
    OutlinedInput,
    TextField,
    InputAdornment,
    IconButton,
    Alert,
} from '@mui/material';
import AccountCircle from '@mui/icons-material/AccountCircle';
import Visibility from '@mui/icons-material/Visibility';
import VisibilityOff from '@mui/icons-material/VisibilityOff';
import { AppProvider } from '@toolpad/core/AppProvider';
import { SignInPage } from '@toolpad/core/SignInPage';
import { useTheme } from '@mui/material/styles';
import { PageContainer } from '../../../globals/styles';
import { LoginContainer } from './styles';
import { Link } from 'react-router-dom';
import { useEffect, useState } from 'react';
import { useForm } from 'react-hook-form';
import { yupResolver } from '@hookform/resolvers/yup';
import Validation from './Validation';
import Header from '../../../Components/Auth/Header';

const providers = [{ id: 'credentials', name: 'Email and Password' }];

function CustomEmailField({ register, errors, loginError }) {
    return (
        <>
            {loginError && <><Alert sx={{ display: 'flex', justifyContent: 'center' }} severity="error">Login Incorreto!</Alert>
                <br /></>}
            <TextField
                {...register("email")}
                id="input-with-icon-textfield"
                label="Email"
                type="email"
                size="small"
                required
                fullWidth
                error={!!errors.email}
                helperText={errors.email?.message}
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

function CustomPasswordField({ register, errors }) {
    const [showPassword, setShowPassword] = useState(false);

    const handleClickShowPassword = () => setShowPassword((show) => !show);

    const handleMouseDownPassword = (event) => {
        event.preventDefault();
    };

    return (
        <FormControl sx={{ my: 2 }} fullWidth variant="outlined">

            <InputLabel size="small" htmlFor="outlined-adornment-password">
                Senha
            </InputLabel>
            <OutlinedInput
                {...register("password")}
                id="outlined-adornment-password"
                type={showPassword ? 'text' : 'password'}
                size="small"
                required
                error={!!errors.password}
                endAdornment={
                    <InputAdornment position="end">
                        <IconButton
                            aria-label="toggle password visibility"
                            onClick={handleClickShowPassword}
                            onMouseDown={handleMouseDownPassword}
                            edge="end"
                            size="small"
                        >
                            {showPassword ? (
                                <VisibilityOff fontSize="inherit" />
                            ) : (
                                <Visibility fontSize="inherit" />
                            )}
                        </IconButton>
                    </InputAdornment>
                }
                label="Senha"
            />
            {errors.password && <p style={{ color: 'red', fontSize: '0.8rem' }}>{errors.password.message}</p>}
        </FormControl>
    );
}

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
            Entrar
        </Button>
    );
}

function SignUpLink() {
    return (
        <Link to="/cadastrar" variant="body2" color={'secondary'}>
            Cadastrar-me
        </Link>
    );
}

function ForgotPasswordLink() {
    return (
        <Link to="/esqueceu" variant="body2" color={'secondary'}>
            Esqueceu sua senha?
        </Link>
    );
}

const TranslatePage = () => {
    document.querySelector('h5').innerHTML = 'Entrar';
    document.querySelectorAll('p').forEach(el => {
        if (el.innerHTML.includes("Welcome")) {
            el.innerHTML = "Acesse Sua Conta Abaixo";
        }
    });

    document.querySelectorAll('span').forEach(el => {
        if (el.innerHTML.includes("Remember")) {
            el.innerHTML = "Relembrar acesso";
        }
    });
}

export default function Login() {
    const { register, handleSubmit, formState: { errors } } = useForm({
        resolver: yupResolver(Validation),
    });

    const [loginError, setLoginError] = useState(false);

    useEffect(() => {
        TranslatePage();
    }, []);

    const theme = useTheme();

    const onSubmit = (formData) => {
        setLoginError(false);

        setLoginError(true);
        console.log(JSON.stringify(formData.get('password')));
    };

    return (

        <>
            <Header />
            <PageContainer>
                <LoginContainer>
                    <AppProvider theme={theme}>
                        <SignInPage
                            signIn={(provider, formData) =>
                                onSubmit(formData)
                            }
                            slots={{
                                emailField: (props) => <CustomEmailField loginError={loginError} {...props} register={register} errors={errors} />,
                                passwordField: (props) => <CustomPasswordField {...props} register={register} errors={errors} />,
                                submitButton: CustomButton,
                                signUpLink: SignUpLink,
                                forgotPasswordLink: ForgotPasswordLink,
                            }}
                            providers={providers}
                        />
                    </AppProvider>
                </LoginContainer>
            </PageContainer></>
    );
}
