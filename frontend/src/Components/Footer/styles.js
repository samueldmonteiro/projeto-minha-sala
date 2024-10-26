import styled from 'styled-components'


export const FooterContainer = styled.footer`

    position: fixed;
    bottom: 0;
    background-color:#161515;
    padding: 15px 24px;
    text-align: center;
    width: 100%;

    @media (max-width: 600px){
       
        padding: 15px 20px;

    }

`

export const Text = styled.p`

    font-size: 12px;

    @media (max-width: 600px){
        font-size: 10px;
    }

`