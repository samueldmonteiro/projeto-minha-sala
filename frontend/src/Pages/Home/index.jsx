import React from 'react'
import { PageContainer, TitleOne } from '../../globals/styles'
import Table from '@mui/material/Table';
import TableBody from '@mui/material/TableBody';
import TableCell from '@mui/material/TableCell';
import TableContainer from '@mui/material/TableContainer';
import TableRow from '@mui/material/TableRow';
import Paper from '@mui/material/Paper';
import { ClassInformationBlock, ClassInformationContainer, Date, MoreInformations, MoreInformationsItem, PaginationControl, Room, Subject, Time } from './styles';
import Pagination from '@mui/material/Pagination';

function createData(name, value) {
    return { name, value };
}

const rows = [
    createData('Matérias Hoje', 1),
    createData('Bloco', 'A'),
    createData('Piso', 4),
    createData('Professor', 'Roberto Pimentel'),
];


const Home = () => {
    return (
        <>
            <PageContainer>
                <ClassInformationContainer>
                    <TitleOne>Horário:</TitleOne>
                    <ClassInformationBlock>
                        <Time>
                            08:00 - 09:40
                        </Time>

                        <Date>
                            Terça, 17 de Setembro
                        </Date>

                        <Room>
                            SALA: <span>412</span>
                        </Room>

                        <Subject>
                            Matéria: Rede de Computadores
                        </Subject>

                        <PaginationControl>
                            <Pagination count={1} variant="outlined" color='primary'/>
                        </PaginationControl>


                        <MoreInformations>
                            <MoreInformationsItem>
                                <TableContainer component={Paper}>
                                    <Table aria-label="simple table">

                                        <TableBody>
                                            {rows.map((row) => (
                                                <TableRow
                                                    key={row.name}
                                                    sx={{ '&:last-child td, &:last-child th': { border: 0 } }}
                                                >
                                                    <TableCell component="th" scope="row">
                                                        {row.name}
                                                    </TableCell>
                                                    <TableCell align="right">{row.value}</TableCell>

                                                </TableRow>
                                            ))}
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