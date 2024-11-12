import React, { useEffect, useState } from 'react'
import { PageContainer, TitleOne } from '../../globals/styles'
import Table from '@mui/material/Table';
import TableBody from '@mui/material/TableBody';
import TableCell from '@mui/material/TableCell';
import TableContainer from '@mui/material/TableContainer';
import TableRow from '@mui/material/TableRow';
import Paper from '@mui/material/Paper';
import { ClassInformationBlock, ClassInformationContainer, Date, MoreInformations, MoreInformationsItem, PaginationControl, Room, Subject, Time } from './styles';
import Pagination from '@mui/material/Pagination';
import { getByDay, getTodayClass } from '../../Services/ClassInformation/GeneralService';
import LoadPage from '../../Components/LoadPage';
import { useLocation } from 'react-router-dom';

function getTodayDate() {
    const today = new window.Date();

    if (today.getDay() === 0) today.setDate(today.getDate() + 1); 
    
    return today.toLocaleDateString("pt-BR", {
        weekday: "long",
        day: "numeric",
        month: "long",
    });
}

const Home = () => {

    const location = useLocation();
    const queryParams = new URLSearchParams(location.search);
    const searchDay = queryParams.get('day');

    const [loadingHome, setLoadingHome] = useState(true);
    const [error, setError] = useState(false);
    const [classNotExists, setClassNotExists] = useState(false);

    const [classData, setClassData] = useState([]);
    const [currentClassIndex, setCurrentClassIndex] = useState(0);

    const nextClass = (event, value) => {
        setCurrentClassIndex((prevIndex) => (prevIndex + 1) % classData.length);
    };

    const currentClass = classData[currentClassIndex];

    const getInformationClass = async (searchEngine, query = null) => {
        searchEngine(query).then(resp => {
            console.log(resp)

            if(resp.statusCode == 404){
                setLoadingHome(false);
                setClassNotExists(true);
                return;
            }

            if(resp.error){
                setLoadingHome(false);
                setError(true);
                return;
            }


            setClassData(resp.data);
            setLoadingHome(false);
        });
    }

    useEffect(() => {

        const searchEngine = searchDay ? getByDay : getTodayClass;
        console.log(searchDay);

        getInformationClass(searchEngine, searchDay);

        const intervalId = setInterval(() => {
            getInformationClass(searchEngine, searchDay);
        }, 6000);

        return () => clearInterval(intervalId);

    }, [searchDay, getTodayClass, getByDay]);



    if (loadingHome) return (<LoadPage open={loadingHome} />);

    if (error) return (
        <PageContainer>
            <ClassInformationContainer>
                <TitleOne>Houve um erro ao buscar informações</TitleOne>
                <TitleOne>Atualize a página!</TitleOne>
            </ClassInformationContainer>
        </PageContainer>
    )

    if (classNotExists) return (
        <PageContainer>
            <ClassInformationContainer>
                <TitleOne>Você não tem aula neste dia!</TitleOne>
            </ClassInformationContainer>
        </PageContainer>
    )
    return (
        <>
            <PageContainer>
                <ClassInformationContainer>
                    <TitleOne>Horário:</TitleOne>
                    <ClassInformationBlock>
                        <Time>
                            {currentClass.start_time} - {currentClass.end_time}
                        </Time>

                        <Date>
                            {searchDay ? localStorage.getItem('dayByClass') : getTodayDate()}
                        </Date>

                        <Room>
                            SALA: <span>{currentClass.room}</span>
                        </Room>

                        <Subject>
                            Matéria: {currentClass.subject}
                        </Subject>

                        <PaginationControl>
                            <Pagination count={classData.length} variant="outlined" color='primary' onChange={nextClass} />
                        </PaginationControl>

                        <MoreInformations>
                            <MoreInformationsItem>
                                <TableContainer component={Paper}>
                                    <Table aria-label="simple table">

                                        <TableBody>
                                        <TableRow
                                                sx={{ '&:last-child td, &:last-child th': { border: 0 } }}
                                            >
                                                <TableCell component="th" scope="row">
                                                    Curso
                                                </TableCell>
                                                <TableCell align="right">{currentClass.course}</TableCell>

                                            </TableRow>
                                            <TableRow
                                                sx={{ '&:last-child td, &:last-child th': { border: 0 } }}
                                            >
                                                <TableCell component="th" scope="row">
                                                    Bloco
                                                </TableCell>
                                                <TableCell align="right">{currentClass.block}</TableCell>

                                            </TableRow>

                                            <TableRow
                                                sx={{ '&:last-child td, &:last-child th': { border: 0 } }}
                                            >
                                                <TableCell component="th" scope="row">
                                                    Piso
                                                </TableCell>
                                                <TableCell align="right">{currentClass.floor}</TableCell>

                                            </TableRow>

                                            <TableRow
                                                sx={{ '&:last-child td, &:last-child th': { border: 0 } }}
                                            >
                                                <TableCell component="th" scope="row">
                                                    Professor
                                                </TableCell>
                                                <TableCell align="right">{currentClass.teacher_name}</TableCell>

                                            </TableRow>

                                        </TableBody>
                                    </Table>
                                </TableContainer>
                            </MoreInformationsItem>
                        </MoreInformations>

                    </ClassInformationBlock>
                </ClassInformationContainer>
            </PageContainer>

        </>
    )
}

export default Home