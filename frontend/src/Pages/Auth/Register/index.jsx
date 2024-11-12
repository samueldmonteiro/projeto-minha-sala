import React, { useEffect, useState } from 'react';
import { useForm, Controller } from 'react-hook-form';
import { yupResolver } from '@hookform/resolvers/yup';
import { PageContainer, TitleOne } from '../../../globals/styles';
import Header from '../../../Components/Auth/Header';
import {RegisterForm, SelectInputs } from './styles';
import TextField from '@mui/material/TextField';
import AccountCircle from '@mui/icons-material/AccountCircle';
import PersonAddIcon from '@mui/icons-material/PersonAdd';
import Autocomplete from '@mui/material/Autocomplete';
import validation from './validation';
import { Link, useNavigate } from 'react-router-dom';
import { Key as KeyIcon } from '@mui/icons-material';
import { getAllCourses } from '../../../Services/Course/GeneralService';
import useMessage from '../../../Hooks/useMessage';
import { registerRequest } from '../../../Services/Student/AuthService';
import LoadingButton from '@mui/lab/LoadingButton';
import { LinkArea } from '../Login/styles';
import useAuth from '../../../Hooks/useAuth';

const semesters = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13'];

const Register = () => {
    const { control, handleSubmit, formState: { errors } } = useForm({
        resolver: yupResolver(validation),
        defaultValues: {
            name: '',
            RA: '',
            course: '',
            semester: '',
        }
    });

    const { Message, setMessage } = useMessage();
    const [loadingRegister, setLoadingRegister] = useState(false);
    const [courses, setCourses] = useState([]);
    const { login } = useAuth();
    const navigate = useNavigate();

    useEffect(() => {

        const handleOptionCourses = async () => {

            const coursesData = await getAllCourses();
            let courseList = [];
            coursesData.data.map(course => {
                courseList.push(course.name);
            });
            setCourses(courseList)
        }

        handleOptionCourses();
    }, [])

    const onSubmit = async (data) => {

        setLoadingRegister(true);
        const resp = await registerRequest(
            data.name, data.RA,
            data.course, data.semester
        );
        setLoadingRegister(false);

        if (resp.error) {
            setMessage(resp.message, resp.type);
            return;
        }

        setMessage(resp.message, 'success');
        login(resp.data.token, resp.data.user);
        navigate('/');
    };

    return (
        <>
            <Header />
            <PageContainer>
                <RegisterForm onSubmit={handleSubmit(onSubmit)}>
                    <TitleOne><PersonAddIcon /> Crie sua Conta</TitleOne>
                    {Message}
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
                        name="RA"
                        required
                        control={control}
                        render={({ field }) => (
                            <TextField
                                {...field}
                                label="RA do aluno"
                                error={!!errors.RA}
                                placeholder="RA"
                                helperText={errors.RA?.message}
                                sx={{ marginBottom: '23px' }}
                                InputProps={{
                                    startAdornment: <KeyIcon sx={{ color: 'action.active', mr: 1, my: 0.5 }} />,
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

                    </SelectInputs>

                    <LoadingButton loading={loadingRegister}
                        color='primary' sx={{ width: '100%' }} type="submit" variant='contained'>Entrar</LoadingButton>

                    <LinkArea>
                        <Link to="/entrar">
                            Já tenho uma conta.
                        </Link>
                    </LinkArea>
                </RegisterForm>
            </PageContainer>
        </>
    );
};

export default Register;
