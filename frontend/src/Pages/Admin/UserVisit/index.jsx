import React, { useEffect, useState } from 'react';
import { Table, TableHead, TableBody, TableRow, TableCell, TableContainer, Paper } from '@mui/material';
import { PageContainer, TitleOne } from '../../../globals/styles';
import { getUserVisits } from '../../../Services/UserService';

const UserVisit = () => {

    const [data, setData] = useState([]);

    const getVisits = async () => {
        getUserVisits().then(resp => {
            setData(resp.data);
            console.log(resp.data)
        });
    }

    useEffect(() => {
        getVisits();

        const intervalId = setInterval(() => getVisits(), 4000);

        return () => clearInterval(intervalId);
    }, []);

    return (
        <PageContainer>
            <TitleOne>Visitas dos usuários:</TitleOne>
            <TableContainer component={Paper}>
                <Table>
                    <TableHead>
                        <TableRow>
                            <TableCell>Name</TableCell>
                            <TableCell>Email</TableCell>
                            <TableCell>Últim. visita</TableCell>
                            <TableCell>QT. visitas</TableCell>
                        </TableRow>
                    </TableHead>
                    <TableBody>
                        {data.map((visit, index) => (
                            <TableRow key={index}>
                                <TableCell>{visit.user.name}</TableCell>
                                <TableCell>{visit.user.email}</TableCell>
                                <TableCell>{visit.visit.last_visit}</TableCell>
                                <TableCell>{visit.visit.total_visits}</TableCell>
                            </TableRow>
                        ))}
                    </TableBody>
                </Table>
            </TableContainer>
            <br /><br /><br />
        </PageContainer>
    );
};

export default UserVisit;
