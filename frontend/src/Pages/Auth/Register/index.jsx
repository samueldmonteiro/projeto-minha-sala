import React from 'react';
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

const courses = ['Ciencia', 'Enfermagem'];


const Register = () => {
    const { control, handleSubmit, formState: { errors } } = useForm({
        resolver: yupResolver(validation),
    });

    const onSubmit = (data) => {
        console.log(data);
    };

    return (
        <>
            <Header />
            <PageContainer>
                <RegisterForm onSubmit={handleSubmit(onSubmit)}>
                    <TitleOne><PersonAddIcon /> Crie sua Conta</TitleOne>
                   {false && <MessageContainer>
                        <Alert severity="warning">Erro ao cadastrar</Alert>
                    </MessageContainer>}
                    <Controller
                        name="nome"
                        required
                        control={control}
                        render={({ field }) => (
                            <TextField
                                {...field}
                                label="Nome Completo"
                                error={!!errors.nome}
                                helperText={errors.nome?.message}
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
                        name="senha"
                        control={control}
                        render={({ field }) => (
                            <TextField
                                {...field}
                                label="Senha"
                                type="password"
                                error={!!errors.senha}
                                helperText={errors.senha?.message}
                                sx={{ marginBottom: '23px' }}
                                InputProps={{
                                    startAdornment: <VpnKeyIcon sx={{ color: 'action.active', mr: 1, my: 0.5 }} />,
                                }}
                            />
                        )}
                    />
                    <SelectInputs>
                        <Controller
                            name="curso"
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
                                            error={!!errors.curso}
                                            helperText={errors.curso?.message}
                                        />
                                    )}
                                    sx={{ marginBottom: '23px' }}
                                />
                            )}
                        />

                        <Controller
                            name="semestre"
                            control={control}
                            render={({ field }) => (
                                <Autocomplete
                                    {...field}
                                    options={courses}
                                    onChange={(_, data) => field.onChange(data)}
                                    renderInput={(params) => (
                                        <TextField
                                            {...params}
                                            label="Semestre"
                                            error={!!errors.semestre}
                                            helperText={errors.semestre?.message}
                                        />
                                    )}
                                    sx={{ marginBottom: '23px' }}
                                />
                            )}
                        />

                        <Controller
                            name="turno"
                            control={control}
                            render={({ field }) => (
                                <Autocomplete
                                    {...field}
                                    options={courses}
                                    onChange={(_, data) => field.onChange(data)}
                                    renderInput={(params) => (
                                        <TextField
                                            {...params}
                                            label="Turno"
                                            error={!!errors.turno}
                                            helperText={errors.turno?.message}
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
