import React, { useState } from 'react';
import { useForm, Controller } from 'react-hook-form';
import { yupResolver } from '@hookform/resolvers/yup';
import { PageContainer, TitleOne } from '../../../globals/styles';
import Header from '../../../Components/Auth/Header';
import { MessageContainer, RegisterForm, SelectInputs } from './styles';
import TextField from '@mui/material/TextField';
import AccountCircle from '@mui/icons-material/AccountCircle';
import PersonAddIcon from '@mui/icons-material/PersonAdd';
import EmailIcon from '@mui/icons-material/Email';
import VpnKeyIcon from '@mui/icons-material/VpnKey';
import Autocomplete from '@mui/material/Autocomplete';
import { Button, Alert } from '@mui/material';
import validation from './validation';
import { registerStudent } from '../../../Services/AuthService';
import { useNavigate } from 'react-router-dom';

const courses = ['Ciência da Computação (M)'];
const shifts = ['Matutino'];
const semesters = ['4'];


const Register = () => {
    const { control, handleSubmit, formState: { errors } } = useForm({
        resolver: yupResolver(validation),
        defaultValues: {  // Definindo valores padrão
            name: '',
            email: '',
            password: '',
            course: '',
            semester: '',
            shift: '',
        }
    });

    const [error, setError] = useState(null);
    const navigate = useNavigate();

    const onSubmit = async (data) => {

        const result = await registerStudent(data);
        console.log(result);
        if(!result.status){
            setError(result.message);
            return;
        }

        localStorage.setItem('token', result.data.token);
        navigate('/');
    };

    return (
        <>
            <Header />
            <PageContainer>
                <RegisterForm onSubmit={handleSubmit(onSubmit)}>
                    <TitleOne><PersonAddIcon /> Crie sua Conta</TitleOne>
                    {error && <MessageContainer>
                        <Alert severity="warning">{error}</Alert>
                    </MessageContainer>}
                    <Controller
                        name="name"
                        required
                        control={control}
                        render={({ field }) => (
                            <TextField
                                {...field}
                                label="Nome Completo"
                                error={!!errors.name}
                                helperText={errors.name?.message}
                                sx={{ marginBottom: '23px' }}
                                InputProps={{
                                    startAdornment: <AccountCircle sx={{ color: 'action.active', mr: 1, my: 0.5 }} />,
                                }}
                            />
                        )}
                    />

                    <Controller
                        name="email"
                        control={control}
                        render={({ field }) => (
                            <TextField

                                {...field}
                                label="E-mail"
                                type="email"
                                error={!!errors.email}
                                helperText={errors.email?.message}
                                sx={{ marginBottom: '23px' }}
                                InputProps={{
                                    startAdornment: <EmailIcon sx={{ color: 'action.active', mr: 1, my: 0.5 }} />,
                                }}
                            />
                        )}
                    />

                    <Controller
                        name="password"
                        control={control}
                        render={({ field }) => (
                            <TextField

                                {...field}
                                label="Senha"
                                type="password"
                                error={!!errors.password}
                                helperText={errors.password?.message}
                                sx={{ marginBottom: '23px' }}
                                InputProps={{
                                    startAdornment: <VpnKeyIcon sx={{ color: 'action.active', mr: 1, my: 0.5 }} />,
                                }}
                            />
                        )}
                    />
                    <SelectInputs>
                        <Controller
                            name="course"
                            control={control}
                            render={({ field }) => (
                                <Autocomplete


                                    {...field}
                                    options={courses}
                                    onChange={(_, data) => field.onChange(data)}
                                    renderInput={(params) => (
                                        <TextField
                                            {...params}
                                            label="Curso"
                                            error={!!errors.course}
                                            helperText={errors.course?.message}
                                        />
                                    )}
                                    sx={{ marginBottom: '23px' }}
                                />
                            )}
                        />

                        <Controller
                            name="semester"
                            control={control}
                            render={({ field }) => (
                                <Autocomplete


                                    {...field}
                                    options={semesters}
                                    onChange={(_, data) => field.onChange(data)}
                                    renderInput={(params) => (
                                        <TextField
                                            {...params}
                                            label="Semestre"
                                            error={!!errors.semester}
                                            helperText={errors.semester?.message}
                                        />
                                    )}
                                    sx={{ marginBottom: '23px' }}
                                />
                            )}
                        />

                        <Controller
                            name="shift"
                            control={control}
                            render={({ field }) => (
                                <Autocomplete

                                    required
                                    {...field}
                                    options={shifts}
                                    onChange={(_, data) => field.onChange(data)}
                                    renderInput={(params) => (
                                        <TextField
                                            {...params}
                                            label="Turno"
                                            error={!!errors.shift}
                                            helperText={errors.shift?.message}
                                        />
                                    )}
                                    sx={{ marginBottom: '23px' }}
                                />
                            )}
                        />
                    </SelectInputs>

                    <Button color='primary' sx={{ width: '100%' }} type="submit" variant='contained'>
                        Cadastrar
                    </Button>
                </RegisterForm>
            </PageContainer>
        </>
    );
};

export default Register;
