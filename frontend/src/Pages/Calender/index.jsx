import { PageContainer, TitleOne } from '../../globals/styles';
import dayjs from 'dayjs';
import 'dayjs/locale/pt-br';
import { DemoContainer, DemoItem } from '@mui/x-date-pickers/internals/demo';
import { AdapterDayjs } from '@mui/x-date-pickers/AdapterDayjs';
import { LocalizationProvider } from '@mui/x-date-pickers/LocalizationProvider';
import { DateCalendar } from '@mui/x-date-pickers/DateCalendar';
import { forwardRef, useState } from 'react';
import { CalenderContainer } from './styles';
import CalendarMonthIcon from '@mui/icons-material/CalendarMonth';
import { Button } from '@mui/material';
import Dialog from '@mui/material/Dialog';
import DialogContent from '@mui/material/DialogContent';
import DialogContentText from '@mui/material/DialogContentText';
import DialogTitle from '@mui/material/DialogTitle';
import Slide from '@mui/material/Slide';
import ErrorIcon from '@mui/icons-material/Error';
import { useNavigate } from 'react-router-dom';

dayjs.locale('pt-br');

const ErrorTransition = forwardRef(function Transition(props, ref) {
    return <Slide direction="up" ref={ref} {...props} />;
});

const Calender = () => {

    const [openErrorModal, setOpenErrorModal] = useState(false);
    const [currentDay, setCurrentDay] = useState(dayjs());
    const navigate = useNavigate();

    const minDate = dayjs().subtract(0, 'week');
    const maxDate = dayjs().add(1, 'week');

    const handleSelectedDay = () => {

        const blockedDays = ['domingo', 'sábado'];
        const selectedDay = currentDay.format('dddd');
        const capitalizedDay = currentDay.format('dddd').charAt(0).toUpperCase() + currentDay.format('dddd').slice(1);

        if (blockedDays.includes(selectedDay)) {
            setOpenErrorModal(true);
            return;
        }
        
        localStorage.setItem('dayByClass', currentDay.format('dddd, D [de] MMMM'));
        navigate(`/?day=${capitalizedDay}`);
    }

    return (
        <PageContainer>
            <Dialog
                open={openErrorModal}
                TransitionComponent={ErrorTransition}
                keepMounted
                onClose={() => setOpenErrorModal(false)}
                aria-describedby="alert-dialog-slide-description"
            >
                <DialogTitle><ErrorIcon sx={{ position: 'relative', top: '6px' }} /> {"Ops!"}</DialogTitle>
                <DialogContent>
                    <DialogContentText>
                        Nenhuma aula encontrada nesse dia!
                    </DialogContentText>
                </DialogContent>

            </Dialog>
            <CalenderContainer>
                <TitleOne><CalendarMonthIcon /> Selecine um dia de Aula</TitleOne>
                <LocalizationProvider dateAdapter={AdapterDayjs} adapterLocale="pt-br">
                    <DemoContainer components={['DateCalendar', 'DateCalendar']}>
                        <DemoItem >
                            <DateCalendar
                                value={currentDay}
                                onChange={(newValue) => setCurrentDay(newValue)}
                                minDate={minDate}
                                maxDate={maxDate}
                            />
                        </DemoItem>
                    </DemoContainer>
                </LocalizationProvider>
                <Button onClick={handleSelectedDay} variant='contained' color={'primary'}>Ver Informações</Button>
            </CalenderContainer>
        </PageContainer>
    );
}

export default Calender;
