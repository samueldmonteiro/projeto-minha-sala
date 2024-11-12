import { PageContainer, TitleOne } from '../../../globals/styles';
import useAuth from '../../../Hooks/useAuth';

const Profile = () => {

    const { user } = useAuth();

    console.log(user);

    return (
        <PageContainer>
            <TitleOne>Ainda em construção...</TitleOne>
        </PageContainer>
    )
}

export default Profile;