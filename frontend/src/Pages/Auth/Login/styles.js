import styled from 'styled-components';
import { Pallete } from '../../../globals/GlobalStyles';

export const LoginContainer = styled.div`
    margin-top: -60px;

    @media (max-width: 600px){
        margin-top: -30px;
    }

    a {
        color: ${Pallete.secondary};
        font-size: 14px;
        margin-top:-14px;
        text-decoration:underline;
    }
`