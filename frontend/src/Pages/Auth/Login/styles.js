import styled from 'styled-components';
import { Pallete } from '../../../globals/GlobalStyles'

export const RegisterForm = styled.form`

    margin: 0 auto;
    margin-top: -125px;
    display: flex;
    flex-direction:column;
    align-items: center;
    margin-bottom:70px;

    input, select {
        width: 380px !important;
    }

    button[type=submit] {
        width: 440px;
    }

    @media (max-width: 600px){
        margin-top: -70px;

        input, select {
            width: 250px !important;
            position: relative;
        }

        button[type=submit] {
            width: 305px;
        }
    }

    @media (max-width: 400px){
        margin-top: -70px;

        input, select {
            width: 220px !important;
            position: relative;
        }

        button[type=submit] {
            width: 275px;
        }
    }
`

export const MessageContainer = styled.div`

    margin-bottom:25px;
    width: 440px;

    @media (max-width: 600px){
        width: 310px;
    }

    @media (max-width: 400px){
        width: 280px;
    }

    @media (max-width: 374px){
        width: 100%;
    }
`

export const LinkArea = styled.div`

    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 440px;
    margin-top:20px;

    a {
        color: ${Pallete.secondary};
        font-size:14px;
        text-decoration:underline;
    }

    @media (max-width: 600px){
        width: 305px;   
    }

    @media (max-width: 400px){
        width: 275px;
    }
`