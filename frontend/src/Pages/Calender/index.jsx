import { PageContainer } from '../../globals/styles';
import dayjs from 'dayjs';
import 'dayjs/locale/pt-br'; // Importa o idioma português
import { DemoContainer, DemoItem } from '@mui/x-date-pickers/internals/demo';
import { AdapterDayjs } from '@mui/x-date-pickers/AdapterDayjs';
import { LocalizationProvider } from '@mui/x-date-pickers/LocalizationProvider';
import { DateCalendar } from '@mui/x-date-pickers/DateCalendar';
import { useState } from 'react';

const Calender = () => {
    const [value, setValue] = useState(dayjs());

    const minDate = dayjs().subtract(1, 'year');
    const maxDate = dayjs().add(1, 'year');

    return (
        <PageContainer>
            <LocalizationProvider dateAdapter={AdapterDayjs} adapterLocale="pt-br">
                <DemoContainer components={['DateCalendar', 'DateCalendar']}>
                    <DemoItem >
                        <DateCalendar
                            value={value}
                            onChange={(newValue) => setValue(newValue)}
                            minDate={minDate}
                            maxDate={maxDate}
                        />
                    </DemoItem>
                </DemoContainer>
            </LocalizationProvider>
        </PageContainer>
    );
}

export default Calender;
