import styled from 'styled-components';

export const TitleOfDescription = styled.h2`
    margin-bottom: 10px;
    font-size: 20px;
`

export const Description = styled.p`
    line-height: 1.5em;
`

export const PersonCardContainer = styled.div`
    display: flex;
    padding-top:10px;
    gap:30px;
    flex-wrap:wrap;
    justify-content: center;
`

export const PersonCard = styled.div`
    border: 2px solid grey;
    border-radius:5px;
    display: flex;
    flex-direction:column;
    padding: 25px 20px;
    align-items: center;
    width: 220px;
    text-align: center;

    @media (max-width: 600px){
        padding: 20px 10px;
        width: 150px;
    }

    @media (max-width: 390px){
        padding: 20px 20px;
        width: 80%;
    }
`

export const PersonCardPosition = styled.div`
    margin: 15px 0px 5px 0px;
    font-weight: 600;
    font-size:14px;
`
export const PersonCardName = styled.div`
    font-size: 14px;
`

export const ContributeContainer = styled.div`
    margin-bottom: 80px;

    div {
        display: flex;
        flex-direction: column;
        align-items: center;
    }
`
export const QRCodePix = styled.img`
    max-width: 180px;
`

export const CodePix = styled.p`

    margin: 0 auto;
    text-align: center;
    margin-top:14px;
    font-size: 12px;
    max-width: 600px;
    word-wrap: break-word;
    width: 100%;
`