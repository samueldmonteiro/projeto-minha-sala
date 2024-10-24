import React from 'react'
import { PageContainer, SectionContainer, TitleOne } from '../../globals/styles'
import InfoIcon from '@mui/icons-material/Info';
import { Description, PersonCard, PersonCardContainer, PersonCardName, PersonCardPosition, TitleOfDescription } from './styles';
import Diversity3Icon from '@mui/icons-material/Diversity3';
import Card from '@mui/material/Card';
import { Avatar, CardContent } from '@mui/material';
import { deepOrange } from '@mui/material/colors';


const persons = [
    { name: 'Samuel Davi', position: 'Programador Full-Stack', image: '', link: 'http://google.com' },
    { name: 'Luís Gustavo', position: 'Designer', image: '', link: 'http://google.com' },
    { name: 'Erick Mendes', position: 'Editor e Designer', image: '', link: 'http://google.com' },
    { name: 'Pedro Henrick', position: 'Analista de Dados', image: '', link: 'http://google.com' },
];


const About = () => {
    return (
        <PageContainer>

            <TitleOne><InfoIcon /> Sobre o Projeto.</TitleOne>
            <TitleOfDescription>Motivação:</TitleOfDescription>
            <Description>
                Uma pesquisa em nossa turma revelou que muitos alunos têm dificuldade para encontrar suas salas de aula rapidamente, devido à quantidade de blocos e à dificuldade de lembrar o número das salas, resultando em atrasos e prejudicando a pontualidade.
            </Description>
            <br />
            <TitleOfDescription>Objetivo:</TitleOfDescription>
            <Description>Para resolver o problema, criamos o projeto "Minha Sala", que oferece uma solução prática e intuitiva para facilitar a vida acadêmica. Ele fornece acesso rápido a informações essenciais, como localização das aulas, horários, blocos, nome do professor e matéria do dia, eliminando buscas demoradas e ajudando os alunos a se concentrarem nos estudos.

            </Description>


            <SectionContainer>
                <TitleOne><Diversity3Icon /> Alunos Responsáveis.</TitleOne>

                <PersonCardContainer>

                    {persons.map((person, i) => (

                        <PersonCard key={i}>
                            <a href={person.link} target='_blank'><Avatar sx={{ width: 70, height: 70, bgcolor: deepOrange[500] }}>{person.name[0]}</Avatar></a>

                            <PersonCardPosition>
                                {person.position}
                            </PersonCardPosition>

                            <PersonCardName>
                                {person.name}
                            </PersonCardName>

                        </PersonCard>
                    ))}



                </PersonCardContainer>
            </SectionContainer>


        </PageContainer>
    )
}

export default About