import styled from 'styled-components'

export const PageContainer = styled.div`
    width: 900px;
    margin:0 auto;
    padding: 0 24px;
    margin-top:150px;

    @media (max-width: 950px){
        width: 100%;     
    }

    @media (max-width: 600px){
        width: auto;
        margin: 0;
        margin-top:90px;
        padding: 0 30px;
    }
`

export const SectionContainer = styled.div`
    margin:30px auto;
`

export const TitleOne = styled.h1`
    text-align: center;
    font-size:32px;
    margin:30px 0px;

    @media (max-width: 600px){
        font-size:25px;
    }

    svg {
        display: inline-block;
        font-size:30px;
        position: relative;
        bottom: -5px;
        margin-right:2px;
    }
`